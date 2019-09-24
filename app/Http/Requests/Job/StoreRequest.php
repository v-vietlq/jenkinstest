<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.job.';

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
            'name_vi'     => 'required|unique:job,name_vi',
            'slug_vi'     => 'required',
            'employer_id' => 'required',
            'category'    => 'required',
            'city'        => 'required',
        ];
    }

    public function messages () 
    {
        return [
            'name_vi.required'     => __($this->message.'name_vi_required'),
            'name_vi.unique'       => __($this->message.'name_vi_unique'),
            'slug_vi.required'     => __($this->message.'slug_vi_required'),
            'employer_id.required' => __($this->message.'employer_id_required'),
            'category.required'    => __($this->message.'category_required'),
            'city.required'        => __($this->message.'city_required'),
        ];
    }
}
