<?php

namespace Modules\MailConfig\Repositories\SmtpSetting;

use App\Repositories\Base\BaseInterface;

interface SmtpSettingInterface extends BaseInterface
{
    public function getConfig();
}
