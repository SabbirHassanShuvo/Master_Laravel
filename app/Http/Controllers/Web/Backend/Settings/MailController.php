<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class MailController extends Controller
{
    public function edit()
    {
        $mailSettings = [
            'mail_mailer'       => config('mail.default'),
            'mail_host'         => config('mail.mailers.smtp.host'),
            'mail_port'         => config('mail.mailers.smtp.port'),
            'mail_username'     => config('mail.mailers.smtp.username'),
            'mail_password'     => config('mail.mailers.smtp.password'),
            'mail_encryption'   => config('mail.mailers.smtp.encryption'),
            'mail_from_address' => config('mail.from.address'),
        ];

        return view('backend.layouts.settings.mailsetting', compact('mailSettings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'mail_mailer'       => 'nullable|string',
            'mail_host'         => 'nullable|string',
            'mail_port'         => 'nullable|string',
            'mail_username'     => 'nullable|string',
            'mail_password'     => 'nullable|string',
            'mail_encryption'   => 'nullable|string',
            'mail_from_address' => 'nullable|string',
        ]);

        $replace = [
            'MAIL_MAILER'       => $data['mail_mailer'] ?? '',
            'MAIL_HOST'         => $data['mail_host'] ?? '',
            'MAIL_PORT'         => $data['mail_port'] ?? '',
            'MAIL_USERNAME'     => $data['mail_username'] ?? '',
            'MAIL_PASSWORD'     => $data['mail_password'] ?? '',
            'MAIL_ENCRYPTION'   => $data['mail_encryption'] ?? '',
            'MAIL_FROM_ADDRESS' => $data['mail_from_address'] ?? '',
        ];

        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        foreach ($replace as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            $replacement = $key . '=' . $value;
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= PHP_EOL . $replacement;
            }
        }

        File::put($envPath, $envContent);

        return back()->with('success', 'Mail settings updated successfully.');
    }
}
