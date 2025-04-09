<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
          'tgl_sewa'  => 'required',
          'berdua' => 'nullable',
          'teman_id'   => ['required_if:berdua,1'],
        ];
    }

    public function messages()
    {
      return [
        'nama_bank.tgl_sewa'    => 'Tanggal Sewa Tidak Boleh Kosong.',
        'teman_id.required' => 'teman tidak boleh kosong'
      ];
    }
}
