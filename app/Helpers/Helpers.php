<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Nwidart\Modules\Facades\Module;

class Helpers
{
    /**
     * Send alert type and message.
     * @return array
     */
    static function sendAlert($success = true, $message = '')
    {
        $alert = array(
            'success' => $success,
            'alert_type' => $success == true ? 'success' : 'error',
            'message' => $message,
        );

        return $alert;
    }

    /**
     * Send array and message.
     * @return array
     */
    static function sendArrayReturn($success = true, $message = '', $data = null)
    {
        $response = array(
            'success' => $success,
            'message' => $message,
            'data' => $data,
        );

        return $response;
    }

    /**
     * Get SMTP configuration from database if MailConfig Module was enabled.
     */
    static function mailConfig()
    {
        if (Module::collections()->has('MailConfig')) {
            if (Schema::hasTable('mail_config_smtp_settings')) {
                $smtpSetting = Cache::remember('smtp_setting', 24 * 60, function () {
                    return \Modules\MailConfig\Entities\SmtpSetting::getConfig()->first();
                });

                if ($smtpSetting) {
                    Config::set('mail.from.address', $smtpSetting->from_email_address);
                    Config::set('mail.from.name', $smtpSetting->from_name);
                    Config::set('mail.mailers.smtp.host', $smtpSetting->smtp_host);
                    Config::set('mail.mailers.smtp.port', $smtpSetting->smtp_port);
                    Config::set('mail.mailers.smtp.encryption', $smtpSetting->type_of_encryption);
                    Config::set('mail.mailers.smtp.username', $smtpSetting->smtp_username);
                    Config::set('mail.mailers.smtp.password', Crypt::decryptString($smtpSetting->smtp_password));
                }
            }
        }
    }

    /**
     * Function to calculate the estimated reading time of the given text.
     * 
     * @param string $text The text to calculate the reading time for.
     * @param string $wpm The rate of words per minute to use.
     * @return Array
     */
    static function estimateReadingTime($text, $wpm = 200)
    {
        $totalWords = str_word_count(strip_tags($text));
        $minutes = floor($totalWords / $wpm);
        $seconds = floor($totalWords % $wpm / ($wpm / 60));

        return array(
            'minutes' => $minutes,
            'seconds' => $seconds
        );
    }
}
