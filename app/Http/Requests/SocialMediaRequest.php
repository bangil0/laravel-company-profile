<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaRequest extends FormRequest
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
            'name'  => 'required|min:3',
            'value' => 'required',
            'icon'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Nama Social Media harus di isi',
            'value.required' => "Link Social Media harus di isi",
            'icon.required'  => "Icon Social Media harus di isi",
        ];
    }
}
