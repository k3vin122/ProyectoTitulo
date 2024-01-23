<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CintaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'codigo' => ['required', 'max:255', 'string'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'ingreso_cinta_sn_rotulo_id' => [
                'required',
                'exists:ingreso_cinta_sn_rotulos,id',
            ],
        ];
    }
}
