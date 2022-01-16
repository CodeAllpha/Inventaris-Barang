<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //protected $redirect = '/ruang?form=create';

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
            'nama_ruang' => 'required|string|max:40',
            'kode_ruang' => 'required|string|min:5|max:5',
            'keterangan'=> 'required|string|max:40'
        ];
    }

}
