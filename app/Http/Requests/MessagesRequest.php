<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
    */
    protected $redirectRoute = 'contact.page.index';
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => [ 'required' , 'email'],
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messagesValidation.name.required'),
            'name.max' => __('messagesValidation.name.max'),
            'email.required' => __('messagesValidation.email.required'),
            'email.email' => __('messagesValidation.email.email'),
            'subject.required' => __('messagesValidation.subject.required'),
            'message.required' => __('messagesValidation.message.required'),
        ];
    }
}
