<?php

namespace Modules\MailConfig\Http\Requests\MailTest;

use App\Helpers\Helpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SendEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'to_email_address' => ['required', 'email'],
            'message'          => ['required', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errorValue = [];
        foreach ($validator->getMessageBag()->getMessages() as $errors) {
            foreach ($errors as $error) {
                $errorValue[] = $error;
            }
        }

        $message = Helpers::sendAlert(false, implode(',', $errorValue));
        $response = redirect()
            ->back()
            ->withInput()
            ->with('alert', $message)
            ->withErrors($validator);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
