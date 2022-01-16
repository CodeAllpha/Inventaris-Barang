<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
            'nama_pegawai' => 'required|string|max:40',
            'username' => 'required|string|max:40',
            'password'=> 'required|min:3|confirmed',
            'nip' => 'required|integer|min:5',
            'alamat' => 'required|string|max:150',
        ];
    }
}
