<?php

namespace Modules\MailConfig\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Modules\MailConfig\Entities\SmtpSetting;

class MailConfigDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        SmtpSetting::create([
            'from_email_address' => env('MAIL_FROM_ADDRESS', 'mail@example.com'),
            'from_name' => env('MAIL_FROM_NAME', config('app.name')),
            'smtp_host' => env('MAIL_HOST', 'mailhog'),
            'smtp_port' => env('MAIL_PORT', '465'),
            'type_of_encryption' => env('MAIL_ENCRYPTION', 'ssl') == 'ssl' ? 1 : 2,
            'smtp_username' => env('MAIL_USERNAME', 'mail@example.com'),
            'smtp_password' => Crypt::encryptString(env('MAIL_PASSWORD', 'password'))
        ]);
        // $this->call("OthersTableSeeder");
    }
}
