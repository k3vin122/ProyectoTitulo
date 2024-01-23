<?php

namespace App\Http\Controllers\Api;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResponsableResource;
use App\Http\Resources\ResponsableCollection;

class EmpresaResponsablesController extends Controller
{
    public function index(
        Request $request,
        Empresa $empresa
    ): ResponsableCollection {
        $this->authorize('view', $empresa);

        $search = $request->get('search', '');

        $responsables = $empresa
            ->responsables()
            ->search($search)
            ->latest()
            ->paginate();

        return new ResponsableCollection($responsables);
    }

    public function store(
        Request $request,
        Empresa $empresa
    ): ResponsableResource {
        $this->authorize('create', Responsable::class);

        $validated = $request->validate([
            'rut' => ['required', 'max:255', 'string'],
            'nombre' => ['required', 'max:255', 'string'],
            'telefono' => ['required', 'max:255', 'string'],
        ]);

        $responsable = $empresa->responsables()->create($validated);

        return new ResponsableResource($responsable);
    }
}
