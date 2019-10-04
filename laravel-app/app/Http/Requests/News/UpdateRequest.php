<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.news.';


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
            'title_vi' => 'required',
            'slug_vi' => 'required',
        ];
    }

    public function messages () 
    {
        return [
            'title_vi.required' => __($this->message.'title_vi_required'),
            'slug_vi.required' => __($this->message.'slug_vi_required'),
        ];
    }
}
