<?php

namespace Modules\MailConfig\Http\Controllers\MailTest;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MailConfig\Http\Requests\MailTest\SendEmailRequest;
use Modules\MailConfig\Services\MailTest\MailConfigMailTestService;

class MailTestController extends Controller
{
    private $mailConfigMailTestService;

    public function __construct(MailConfigMailTestService $mailConfigMailTestService)
    {
        $this->mailConfigMailTestService = $mailConfigMailTestService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('mailconfig::mail-test.index');
    }

    public function send(SendEmailRequest $request)
    {
        $result = $this->mailConfigMailTestService->sendEmail($request->to_email_address, $request->message);

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.mail-config.mail-test.index')->with('alert', $result);
        }
    }

    public function templateView()
    {
        $textMessage = '### Test Markdown H3';

        return view('mailconfig::mail-test.template.html.layout', [
            'textMessage' => $textMessage
        ]);
    }
}
