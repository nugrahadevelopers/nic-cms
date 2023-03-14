<?php

namespace Modules\Blog\Http\Requests\Post;

use App\Helpers\Helpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'featured_img' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'title' => ['required'],
            'excerpt' => ['required'],
            'content' => ['required'],
            'post_date' => ['required'],
            'post_status' => ['required', 'integer'],
            'post_comment_status' => ['required'],
            'seo_title' => ['nullable', 'string', 'max:60'],
            'seo_description' => ['nullable', 'string', 'max:156'],
            'seo_keyword' => ['nullable', 'string'],
            'seo_image' => ['nullable', 'string'],
            'category_id' => ['nullable'],
            'tag_id' => ['nullable'],
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
