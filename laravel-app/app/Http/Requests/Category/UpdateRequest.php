<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.category.';

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
            'name_vi' => 'required|unique:category,name_vi,'.$this->id,
            'slug_vi' => 'required'
        ];
    }

    public function messages () 
    {
        return [
            'name_vi.required' => __($this->message.'name_vi_required'),
            'name_vi.unique'   => __($this->message.'name_vi_unique'),
            'slug_vi.required' => __($this->message.'slug_vi_required'),
        ];
    }
}
