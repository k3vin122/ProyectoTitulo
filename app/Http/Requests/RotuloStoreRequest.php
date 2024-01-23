<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RotuloStoreRequest extends FormRequest
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
            'codigo' => ['required', 'max:255', 'string', 'unique:rotulos'],
            'estado_rotulo_id' => ['required', 'exists:estado_rotulos,id'],
        ];
    }

    public function messages()
    {

        return[

            'codigo.unique'=> 'Código Exitente ',



        ];

    }
}
