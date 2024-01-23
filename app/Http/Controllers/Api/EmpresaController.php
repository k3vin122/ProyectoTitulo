<?php

namespace App\Http\Controllers\Api;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Http\Resources\EmpresaCollection;
use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;

class EmpresaController extends Controller
{
    public function index(Request $request): EmpresaCollection
    {
        $this->authorize('view-any', Empresa::class);

        $search = $request->get('search', '');

        $empresas = Empresa::search($search)
            ->latest()
            ->paginate();

        return new EmpresaCollection($empresas);
    }

    public function store(EmpresaStoreRequest $request): EmpresaResource
    {
        $this->authorize('create', Empresa::class);

        $validated = $request->validated();

        $empresa = Empresa::create($validated);

        return new EmpresaResource($empresa);
    }

    public function show(Request $request, Empresa $empresa): EmpresaResource
    {
        $this->authorize('view', $empresa);

        return new EmpresaResource($empresa);
    }

    public function update(
        EmpresaUpdateRequest $request,
        Empresa $empresa
    ): EmpresaResource {
        $this->authorize('update', $empresa);

        $validated = $request->validated();

        $empresa->update($validated);

        return new EmpresaResource($empresa);
    }

    public function destroy(Request $request, Empresa $empresa): Response
    {
        $this->authorize('delete', $empresa);

        $empresa->delete();

        return response()->noContent();
    }
}
