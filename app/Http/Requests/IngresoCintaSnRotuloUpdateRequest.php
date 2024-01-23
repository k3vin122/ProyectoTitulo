<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoCintaSnRotuloUpdateRequest extends FormRequest
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
            'serie' => ['required', 'max:255', 'string'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'estado_sn_rotulo_id' => [
                'required',
                'exists:estado_sn_rotulos,id',
            ],
            'rotulo_id' => ['required', 'exists:rotulos,id'],
        ];
    }
}
