<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         MailSetting::updateOrCreate(
            ['id' => 1],
            [
                'mailer' => 'smtp',
                'host' => 'smtp.mailtrap.io',
                'port' => 2525,
                'encryption' => 'tls',
                'username' => 'your_mailtrap_username',
                'password' => 'your_mailtrap_password',
                'from_address' => 'hello@example.com',
                'from_name' => 'Legendary App',
            ]
        );
    }
}
