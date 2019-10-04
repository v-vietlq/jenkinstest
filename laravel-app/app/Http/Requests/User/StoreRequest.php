<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.user.';
    
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
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'fullname' => 'required',
            'phone'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => __($this->message.'email_required'),
            'email.email'        => __($this->message.'email_email'),
            'email.unique'       => __($this->message.'email_unique'),
            'password.required'  => __($this->message.'password_required'),
            'password.confirmed' => __($this->message.'password_confirmed'),
            'password.min'       => __($this->message.'password_min'),
            'fullname.required'  => __($this->message.'fullname_required'),
            'phone.required'     => __($this->message.'phone_required')
        ];
    }
}
