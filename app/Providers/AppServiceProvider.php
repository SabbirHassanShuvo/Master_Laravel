<?php

namespace App\Providers;

use App\Models\WebSetting;
use App\Models\MailSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        // Avoid DB access during artisan commands
        if ($this->app->runningInConsole()) {
            View::composer('*', function ($view) {
                $view->with('setting', null);
            });
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Dynamic Mail Configuration (DB Driven)
        |--------------------------------------------------------------------------
        */
        if (Schema::hasTable('mail_settings')) {

            $mailSetting = MailSetting::first();

            // Only configure if we have at least host & username
            if ($mailSetting && !empty($mailSetting->host) && !empty($mailSetting->username)) {

                Config::set('mail.default', 'smtp');

                Config::set('mail.mailers.smtp', [
                    'transport'    => 'smtp',
                    'host'         => $mailSetting->host ?? 'smtp.mailtrap.io',
                    'port'         => $mailSetting->port ?? 2525,
                    'encryption'   => $mailSetting->encryption ?? null,
                    'username'     => $mailSetting->username ?? null,
                    'password'     => $mailSetting->password ?? null,
                    'timeout'      => null,
                    'local_domain' => parse_url(config('app.url'), PHP_URL_HOST),
                    'stream'       => [
                        'ssl' => [
                            'allow_self_signed' => true,
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ],
                ]);

                Config::set('mail.from.address', $mailSetting->from_address ?? 'hello@example.com');
                Config::set('mail.from.name', $mailSetting->from_name ?? config('app.name'));

            } else {
                // Fallback: don't configure SMTP if settings not valid
                Config::set('mail.default', 'log');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Global Web Settings (View Composer)
        |--------------------------------------------------------------------------
        */
        if (Schema::hasTable('web_settings')) {
            View::composer('*', function ($view) {
                $setting = WebSetting::first();
                $view->with('setting', $setting);
            });
        } else {
            View::composer('*', function ($view) {
                $view->with('setting', null);
            });
        }
    }
}
