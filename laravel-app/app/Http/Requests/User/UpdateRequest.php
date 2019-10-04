<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'    => 'required|email|unique:users,email,'.$this->id,
            'fullname' => 'required',
            'phone'    => 'required'   
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => __($this->message.'email_required'),
            'email.email'       => __($this->message.'email_email'),
            'email.unique'      => __($this->message.'email_unique'),
            'fullname.required' => __($this->message.'fullname_required'),
            'phone.required'    => __($this->message.'phone_required')
        ];
    }
}
