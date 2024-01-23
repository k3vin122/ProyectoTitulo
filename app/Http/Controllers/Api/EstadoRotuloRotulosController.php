<?php

namespace App\Http\Controllers\Api;

use App\Models\EstadoRotulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RotuloResource;
use App\Http\Resources\RotuloCollection;

class EstadoRotuloRotulosController extends Controller
{
    public function index(
        Request $request,
        EstadoRotulo $estadoRotulo
    ): RotuloCollection {
        $this->authorize('view', $estadoRotulo);

        $search = $request->get('search', '');

        $rotulos = $estadoRotulo
            ->rotulos()
            ->search($search)
            ->latest()
            ->paginate();

        return new RotuloCollection($rotulos);
    }

    public function store(
        Request $request,
        EstadoRotulo $estadoRotulo
    ): RotuloResource {
        $this->authorize('create', Rotulo::class);

        $validated = $request->validate([
            'codigo' => ['required', 'max:255', 'string'],
        ]);

        $rotulo = $estadoRotulo->rotulos()->create($validated);

        return new RotuloResource($rotulo);
    }
}
