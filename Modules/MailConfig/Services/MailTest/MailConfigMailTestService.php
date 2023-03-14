<?php

namespace Modules\MailConfig\Services\MailTest;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Mail;
use Modules\MailConfig\Emails\MailTest\SendTestEmail;

class MailConfigMailTestService
{
    public function sendEmail($emailTo, $message)
    {
        try {
            Mail::to($emailTo)->send(new SendTestEmail($message));
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Email berhasil dikirim.');
    }
}
