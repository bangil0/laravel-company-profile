<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name' => 'required',
            'item_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => 'Nama Item harus di isi',
            'item_name.required' => "Deskripsi Item harus di isi",
        ];
    }
}
