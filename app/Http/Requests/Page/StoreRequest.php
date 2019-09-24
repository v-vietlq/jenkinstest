<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @var Message
     */
    private $message = 'message.page.';

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
            'title_vi' => 'required|unique:page,title_vi',
            'slug_vi' => 'required',
        ];
    }

    public function messages () 
    {
        return [
            'title_vi.required' => __($this->message.'title_vi_required'),
            'title_vi.unique'   => __($this->message.'title_vi_unique'),
            'slug_vi.required' => __($this->message.'slug_vi_required'),
        ];
    }
}
