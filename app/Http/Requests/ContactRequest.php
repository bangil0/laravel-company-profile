<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'contact_name'    => 'required|min:3',
            'contact_email'   => 'required|email',
            'contact_subject' => 'required',
            'contact_message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'contact_name.required'    => 'Nama harus di isi',
            'contact_email.required'   => "Email harus di isi",
            'contact_email.email'      => "Email format salah",
            'contact_subject.required' => 'Subject harus di isi',
            'contact_message.required' => "Pesan harus di isi",
        ];
    }
}
