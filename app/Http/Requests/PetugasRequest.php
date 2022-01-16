<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasRequest extends FormRequest
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
            'nama_petugas' => 'required|string|max:40',
            'username' => 'required|string|max:40',
            'password'=> 'required|confirmed|min:3',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'nama_petugas.required' => 'Nama Petugas tidak boleh kosong!',
    //         'username.required' => 'Username tidak boleh kosong!',
    //         'password.required' => 'Password tidak boleh kosong!',
    //     ];
    // }

}
