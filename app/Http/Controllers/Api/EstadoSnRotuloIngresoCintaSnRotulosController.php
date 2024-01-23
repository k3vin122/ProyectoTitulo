<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EstadoSnRotulo;
use App\Http\Controllers\Controller;
use App\Http\Resources\IngresoCintaSnRotuloResource;
use App\Http\Resources\IngresoCintaSnRotuloCollection;

class EstadoSnRotuloIngresoCintaSnRotulosController extends Controller
{
    public function index(
        Request $request,
        EstadoSnRotulo $estadoSnRotulo
    ): IngresoCintaSnRotuloCollection {
        $this->authorize('view', $estadoSnRotulo);

        $search = $request->get('search', '');

        $ingresoCintaSnRotulos = $estadoSnRotulo
            ->ingresoCintaSnRotulos()
            ->search($search)
            ->latest()
            ->paginate();

        return new IngresoCintaSnRotuloCollection($ingresoCintaSnRotulos);
    }

    public function store(
        Request $request,
        EstadoSnRotulo $estadoSnRotulo
    ): IngresoCintaSnRotuloResource {
        $this->authorize('create', IngresoCintaSnRotulo::class);

        $validated = $request->validate([
            'serie' => ['required', 'max:255', 'string'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'rotulo_id' => ['required', 'exists:rotulos,id'],
        ]);

        $ingresoCintaSnRotulo = $estadoSnRotulo
            ->ingresoCintaSnRotulos()
            ->create($validated);

        return new IngresoCintaSnRotuloResource($ingresoCintaSnRotulo);
    }
}
