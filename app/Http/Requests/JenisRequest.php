<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class JenisRequest extends FormRequest
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
            'nama_jenis' => 'required|string|max:40',
            'kode_jenis' => 'required|string|min:5|max:5',
            'keterangan'=> 'required|string|max:40'
        ];
    }

    public function message()
    {
        //
    }
}
