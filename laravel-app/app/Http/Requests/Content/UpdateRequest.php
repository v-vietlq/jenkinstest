<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.content.';

    
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
            'code'       => 'required|unique:content,code,'.$this->id,
            'content_vi' => 'required',
        ];
    }

    public function messages () 
    {
        return [
            'code.required'       => __($this->message.'code_required'),
            'code.unique'         => __($this->message.'code_unique'),
            'content_vi.required' => __($this->message.'content_vi_required'),
        ];
    }
}
