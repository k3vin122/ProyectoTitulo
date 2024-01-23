<?php

namespace App\Http\Controllers\Api;

use App\Models\Rotulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\IngresoCintaSnRotuloResource;
use App\Http\Resources\IngresoCintaSnRotuloCollection;

class RotuloIngresoCintaSnRotulosController extends Controller
{
    public function index(
        Request $request,
        Rotulo $rotulo
    ): IngresoCintaSnRotuloCollection {
        $this->authorize('view', $rotulo);

        $search = $request->get('search', '');

        $ingresoCintaSnRotulos = $rotulo
            ->ingresoCintaSnRotulos()
            ->search($search)
            ->latest()
            ->paginate();

        return new IngresoCintaSnRotuloCollection($ingresoCintaSnRotulos);
    }

    public function store(
        Request $request,
        Rotulo $rotulo
    ): IngresoCintaSnRotuloResource {
        $this->authorize('create', IngresoCintaSnRotulo::class);

        $validated = $request->validate([
            'serie' => ['required', 'max:255', 'string'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'estado_sn_rotulo_id' => [
                'required',
                'exists:estado_sn_rotulos,id',
            ],
        ]);

        $ingresoCintaSnRotulo = $rotulo
            ->ingresoCintaSnRotulos()
            ->create($validated);

        return new IngresoCintaSnRotuloResource($ingresoCintaSnRotulo);
    }
}
