<?php

namespace App\Providers;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    // Load mail settings from DB
            $mailSetting = MailSetting::first();

            if ($mailSetting) {
                Config::set('mail.default', $mailSetting->mailer ?: 'smtp');

                Config::set('mail.mailers.smtp', [
                    'transport' => 'smtp',
                    'host' => $mailSetting->host ?: 'smtp.mailtrap.io',
                    'port' => $mailSetting->port ?: 2525,
                    'encryption' => $mailSetting->encryption ?: 'tls',
                    'username' => $mailSetting->username ?: '',
                    'password' => $mailSetting->password ?: '',
                    'timeout' => null,
                    'local_domain' => parse_url(config('app.url'), PHP_URL_HOST),
                ]);

                Config::set('mail.from.address', $mailSetting->from_address ?: 'hello@example.com');
                Config::set('mail.from.name', $mailSetting->from_name ?: config('app.name'));
            }
    }
}