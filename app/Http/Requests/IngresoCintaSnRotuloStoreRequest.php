<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoCintaSnRotuloStoreRequest extends FormRequest
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
            'serie' => ['required', 'max:255', 'string', 'unique:ingreso_cinta_sn_rotulos'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'estado_sn_rotulo_id' => [
                'required',
                'exists:estado_sn_rotulos,id',
            ],
            'rotulo_id' => ['required', 'exists:rotulos,id', 'unique:ingreso_cinta_sn_rotulos'],
        ];
    }

    public function messages()
    {

        return[

            'serie.unique'=> 'Esta serie exite ',
            'rotulo_id.unique'=> 'La identificación del rotulo ya ha sido tomada.'



        ];

    }
}
