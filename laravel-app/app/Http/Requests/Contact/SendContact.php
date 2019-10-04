<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class SendContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'content' => 'required',
        ];
    }
    public function messages () 
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone number',
            'phone.required' => 'This is not a phone number',
            'address.required' => 'Please enter your address',
            'content.required' => 'Please enter your message',
        ];
    }
}
