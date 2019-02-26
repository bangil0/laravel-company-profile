<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemDetailRequest extends FormRequest
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
                        'item_id'                 => 'required',
                        'item_detail_name'        => 'required',
                        'item_detail_description' => 'required',
                        'item_detail_link'        => 'nullable',
                        'item_detail_people'      => 'nullable',
                        'file'                    => 'required|max:10000|mimes:jpg,jpeg,png'
                    ];
            case 'PUT':
                return [
                    'item_detail_name'        => 'required',
                    'item_detail_description' => 'required',
                    'item_detail_link'        => 'nullable',
                    'item_detail_people'      => 'nullable',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'item_id.required'                 => 'Nama Item harus di isi',
            'item_detail_name.required'        => "Detail Item harus di isi",
            'item_detail_description.required' => 'Deskripsi harus di isi',
            'file.required'                    => 'Gambar harus di isi',
            'file.mimes'                       => 'Gambar berupa jpg, jpeg, png',
        ];
    }
}
