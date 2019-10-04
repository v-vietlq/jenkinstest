<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required'  => __($this->message.'password_required'),
            'password.confirmed' => __($this->message.'password_confirmed'),
            'password.min'       => __($this->message.'password_min'),
        ];
    }
}
