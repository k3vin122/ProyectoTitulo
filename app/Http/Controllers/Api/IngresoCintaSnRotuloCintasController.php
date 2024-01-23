<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\IngresoCintaSnRotulo;
use App\Http\Controllers\Controller;
use App\Http\Resources\CintaResource;
use App\Http\Resources\CintaCollection;

class IngresoCintaSnRotuloCintasController extends Controller
{
    public function index(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): CintaCollection {
        $this->authorize('view', $ingresoCintaSnRotulo);

        $search = $request->get('search', '');

        $cintas = $ingresoCintaSnRotulo
            ->cintas()
            ->search($search)
            ->latest()
            ->paginate();

        return new CintaCollection($cintas);
    }

    public function store(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): CintaResource {
        $this->authorize('create', Cinta::class);

        $validated = $request->validate([
            'codigo' => ['required', 'max:255', 'string'],
            'almacenamiento' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
        ]);

        $cinta = $ingresoCintaSnRotulo->cintas()->create($validated);

        return new CintaResource($cinta);
    }
}
