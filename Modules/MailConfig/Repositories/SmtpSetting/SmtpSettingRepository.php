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
        return $config;
    }
}
