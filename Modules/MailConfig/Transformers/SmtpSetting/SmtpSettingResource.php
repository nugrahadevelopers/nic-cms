<?php

namespace Modules\MailConfig\Transformers\SmtpSetting;

use Illuminate\Http\Resources\Json\JsonResource;

class SmtpSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'from_email_address' => $this->from_email_address,
            'from_name'          => $this->from_name,
            'smtp_host'          => $this->smtp_host,
            'smtp_port'          => $this->smtp_port,
            'type_of_encryption' => $this->type_of_encryption,
            'smtp_username'      => $this->smtp_username,
        ];
    }
}
