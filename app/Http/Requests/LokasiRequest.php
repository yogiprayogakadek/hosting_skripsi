<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LokasiRequest extends FormRequest
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
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi' => 'required',
        ];

        if(!Request::instance()->has('id_lokasi')) {
            $rules += [
                'foto' => 'required',
                // 'foto' => 'nullable',
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else {
            $rules += [
                'foto' => 'nullable',
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah tersedia',
            'numeric' => ':attribute harus berupa angka',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar',
            'max' => ':attribute tidak boleh lebih dari 2MB',
        ];
    }

    public function attributes()
    {
        $attr = [
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'deskripsi' => 'Deskripsi',
            'foto' => 'Foto',
        ];

        return $attr;
    }
}
