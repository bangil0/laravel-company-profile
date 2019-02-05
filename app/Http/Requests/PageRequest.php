<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_name' => 'required|min:3',
            'page_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'page_name.required'        => 'Nama Halaman harus di isi',
            'page_description.required' => "Deskripsi halaman harus di isi",
        ];
    }
}
