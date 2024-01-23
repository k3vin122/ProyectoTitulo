<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoStoreRequest extends FormRequest
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
            'cinta_id' => ['required', 'exists:cintas,id'],
            'estado_movimiento_id' => [
                'required',
                'exists:estado_movimientos,id',
            ],
            'responsable_id' => ['required', 'exists:responsables,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
