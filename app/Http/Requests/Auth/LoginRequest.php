<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.auth.';

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
            'email'    => 'required|email|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => __($this->message.'email_required'),
            'email.email'        => __($this->message.'email_email'),
            'email.exists'       => __($this->message.'email_exists'),
            'password.required'  => __($this->message.'password_required')
        ];
    }
}
