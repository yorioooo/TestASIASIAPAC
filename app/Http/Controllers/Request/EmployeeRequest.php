<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Sesuaikan dengan logika otorisasi
    }

    public function rules()
    {
        return [
            'nomor' => 'required|string|max:15|unique:employees,nomor',
            'nama' => 'required|string|max:150',
            'jabatan' => 'nullable|string|max:200',
            'tglahir' => 'nullable|date',
            'photo' => 'nullable|image|max:2048', // Validasi upload foto
        ];
    }
}