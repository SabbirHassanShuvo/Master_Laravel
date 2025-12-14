<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Models\MailSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class MailController extends Controller
{
     public function edit()
    {
        $mailSetting = MailSetting::first();

        $mailSettings = [
            'mail_mailer'       => $mailSetting->mailer ?? '',
            'mail_host'         => $mailSetting->host ?? '',
            'mail_port'         => $mailSetting->port ?? '',
            'mail_username'     => $mailSetting->username ?? '',
            'mail_password'     => $mailSetting->password ?? '',
            'mail_encryption'   => $mailSetting->encryption ?? '',
            'mail_from_address' => $mailSetting->from_address ?? '',
            'mail_from_name'    => $mailSetting->from_name ?? env('APP_NAME', 'Laravel'),
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
            'mail_from_name'    => 'nullable|string',
        ]);

        // DB update
        $mailSetting = MailSetting::first() ?? new MailSetting();
        $mailSetting->mailer       = $data['mail_mailer'] ?? 'smtp';
        $mailSetting->host         = $data['mail_host'] ?? 'smtp.mailtrap.io';
        $mailSetting->port         = $data['mail_port'] ?? 2525;
        $mailSetting->username     = $data['mail_username'] ?? '';
        $mailSetting->password     = $data['mail_password'] ?? '';
        $mailSetting->encryption   = $data['mail_encryption'] ?? 'tls';
        $mailSetting->from_address = $data['mail_from_address'] ?? 'hello@example.com';
        $mailSetting->from_name    = $data['mail_from_name'] ?? config('app.name');
        $mailSetting->save();

        return back()->with('success', 'Mail settings updated successfully.');
    }
}