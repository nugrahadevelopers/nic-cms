<?php

namespace Modules\MailConfig\Services\SmtpSetting;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Cache;
use Modules\MailConfig\Entities\SmtpSetting;
use Modules\MailConfig\Repositories\SmtpSetting\SmtpSettingInterface;
use Modules\MailConfig\Transformers\SmtpSetting\SmtpSettingResource;

class MailConfigSmtpSettingService
{
    private $smtpSettingInterface;

    public function __construct(SmtpSettingInterface $smtpSettingInterface)
    {
        $this->smtpSettingInterface = $smtpSettingInterface;
    }

    public function getSetting()
    {
        try {
            $setting = $this->smtpSettingInterface->getConfig();
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return $setting;
    }

    public function updateSetting(array $data)
    {
        try {
            $smtpSetting = $this->smtpSettingInterface->getConfig();
            $this->smtpSettingInterface->update($smtpSetting, $data);

            Cache::forget('smtp_setting');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Pengaturan SMTP berhasil diubah.');
    }
}
