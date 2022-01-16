<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarisRequest extends FormRequest
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

            'nama' => 'required|string|max:50',
            'kondisi' => 'required|string|max:50',
            'keterangan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:1|max:100',
            'kode_inventaris' => 'required|min:5|max:5',
            'tanggal_register' => 'required|date',
            'photo_barang' => 'required|image',
            'id_jenis' => 'required|integer|exists:jenis,id',
            'id_ruang' => 'required|integer|exists:ruang,id',
            'id_petugas' => 'required|integer|exists:petugas,id',
        ];
    }
}
