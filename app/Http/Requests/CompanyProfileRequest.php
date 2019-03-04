<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
            'company_name'    => 'required|min:3',
            'company_phone'   => 'required',
            'company_address' => 'required',
            'company_email'   => 'required|email',
        ];

        
    }

    public function messages()
    {
        return [
            'company_name.required'  => 'Nama harus di isi',
            'company_phone.required' => "Telepon harus di isi",
            'company_email.required' => "Email harus di isi",
            'company_email.email'    => "Email format salah",
            'file.required'          => 'Gambar harus di isi',
            'file.mimes'             => 'Gambar berupa jpg, jpeg, png',
        ];
    }
}
