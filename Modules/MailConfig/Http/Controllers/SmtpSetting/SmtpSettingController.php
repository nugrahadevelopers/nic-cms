<?php

namespace Modules\MailConfig\Http\Controllers\SmtpSetting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MailConfig\Http\Requests\SmtpSetting\UpdateSmtpSettingRequest;
use Modules\MailConfig\Services\SmtpSetting\MailConfigSmtpSettingService;

class SmtpSettingController extends Controller
{
    private $mailConfigSmtpSettingService;

    public function __construct(MailConfigSmtpSettingService $mailConfigSmtpSettingService)
    {
        $this->mailConfigSmtpSettingService = $mailConfigSmtpSettingService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $setting = $this->mailConfigSmtpSettingService->getSetting();
        return view('mailconfig::smtp-setting.index', [
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSmtpSettingRequest $request)
    {
        $result = $this->mailConfigSmtpSettingService->updateSetting($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.mail-config.smtp-settings.index')->with('alert', $result);
        }
    }
}
