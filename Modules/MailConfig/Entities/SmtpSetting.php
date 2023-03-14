<?php

namespace Modules\MailConfig\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;

class SmtpSetting extends Model
{
    use HasFactory;

    const TYPE_OF_ENCRYPTION_NONE = 0;
    const TYPE_OF_ENCRYPTION_SSL  = 1;
    const TYPE_OF_ENCRYPTION_TLS  = 2;

    protected $table = 'mail_config_smtp_settings';

    protected $fillable = [
        'from_email_address',
        'from_name',
        'smtp_host',
        'smtp_port',
        'type_of_encryption',
        'smtp_username',
        'smtp_password',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetConfig($query)
    {
        $query->take(1);
    }

    protected function typeOfEncryption(): Attribute
    {
        return Attribute::make(
            get: fn ($input) => $input == self::TYPE_OF_ENCRYPTION_SSL ? 'ssl' : 'tls',
        );
    }

    protected function smtpPassword(): Attribute
    {
        return Attribute::make(
            set: fn ($input) => Crypt::encryptString($input),
        );
    }
}
