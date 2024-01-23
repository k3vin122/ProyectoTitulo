<?php

namespace App\Http\Controllers\Api;

use App\Models\Cinta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CintaResource;
use App\Http\Resources\CintaCollection;
use App\Http\Requests\CintaStoreRequest;
use App\Http\Requests\CintaUpdateRequest;

class CintaController extends Controller
{
    public function index(Request $request): CintaCollection
    {
        $this->authorize('view-any', Cinta::class);

        $search = $request->get('search', '');

        $cintas = Cinta::search($search)
            ->latest()
            ->paginate();

        return new CintaCollection($cintas);
    }

    public function store(CintaStoreRequest $request): CintaResource
    {
        $this->authorize('create', Cinta::class);

        $validated = $request->validated();

        $cinta = Cinta::create($validated);

        return new CintaResource($cinta);
    }

    public function show(Request $request, Cinta $cinta): CintaResource
    {
        $this->authorize('view', $cinta);

        return new CintaResource($cinta);
    }

    public function update(
        CintaUpdateRequest $request,
        Cinta $cinta
    ): CintaResource {
        $this->authorize('update', $cinta);

        $validated = $request->validated();

        $cinta->update($validated);

        return new CintaResource($cinta);
    }

    public function destroy(Request $request, Cinta $cinta): Response
    {
        $this->authorize('delete', $cinta);

        $cinta->delete();

        return response()->noContent();
    }
}
