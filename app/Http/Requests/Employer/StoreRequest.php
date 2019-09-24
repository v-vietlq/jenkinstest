<?php

namespace App\Http\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.employer.';

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
            'name_vi' => 'required|unique:employer,name_vi',
            'slug_vi' => 'required',
            'viewed'  => 'required'
        ];
    }

    public function messages () 
    {
        return [
            'name_vi.required' => __($this->message.'name_vi_required'),
            'name_vi.unique'   => __($this->message.'name_vi_unique'),
            'slug_vi.required' => __($this->message.'slug_vi_required'),
            'viewed.required'  => __($this->message.'viewed_required'),
        ];
    }
}
