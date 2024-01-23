<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
            'rol' => ['required', 'max:255', 'string'],
            'nombre' => ['required', 'max:255', 'string'],
            'direccion' => ['required', 'max:255', 'string'],
            'telefono' => ['required', 'max:255', 'string'],
            'correo' => ['required', 'max:255', 'string'],
        ];
    }
}
