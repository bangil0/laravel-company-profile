<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
                return [
                        'category_id'      => 'required|numeric',
                        'post_name'        => 'required',
                        'post_description' => 'required',
                        'file'             => 'required|max:10000|mimes:jpg,jpeg,png'
                    ];
            case 'PUT':
                return [
                    'category_id'      => 'required|numeric',
                    'post_name'        => 'required',
                    'post_description' => 'required',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'category_id.required'      => 'Kategori post harus di isi',
            'post_name.required'        => 'Judul post harus di isi',
            'post_description.required' => 'Deskripsi post harus di isi',
            'file.required'             => 'Gambar post harus di isi',
            'file.mimes'                => 'Gambar berupa jpg, jpeg, png',
        ];
    }
}
