<?php

namespace Modules\MailConfig\Repositories\SmtpSetting;

use App\Repositories\Base\BaseRepository;
use Modules\MailConfig\Entities\SmtpSetting;

class SmtpSettingRepository extends BaseRepository implements SmtpSettingInterface
{
    public function __construct(SmtpSetting $model)
    {
        parent::__construct($model);
    }

    public function getConfig()
    {
        $config = SmtpSetting::take(1)->first();

        if ($config) {
            return $config;
        } else {
            return SmtpSetting::create([
                'from_email_address' => 'hello@example.com',
                'from_name' => config('app.name'),
                'smtp_host' => 'mailhog',
                'smtp_port' => '1025',
                'type_of_encryption' => 1,
                'smtp_username' => '',
                'smtp_password' => '',
            ]);
        }
    }
}
