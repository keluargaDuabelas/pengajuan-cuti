<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePengajuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


     public function rules(): array
     {
         return [
             'jenis_cuti_id' => 'required|exists:jenis_cutis,id',
             'start_date' => 'required|date',
             'end_date' => 'required|date|after_or_equal:start_date',
         ];
     }

     public function messages()
     {
         return [
             'jenis_cuti.required' => 'Jenis cuti harus dipilih.',
             'jenis_cuti.exists' => 'Jenis cuti tidak valid.',
             'start_date.required' => 'Tanggal mulai harus diisi.',
             'start_date.date' => 'Tanggal mulai tidak valid.',
             'end_date.required' => 'Tanggal selesai harus diisi.',
             'end_date.date' => 'Tanggal selesai tidak valid.',
             'end_date.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
         ];
     }
}
