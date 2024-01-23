<?php

namespace App\Http\Controllers\Api;

use App\Models\Rotulo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RotuloResource;
use App\Http\Resources\RotuloCollection;
use App\Http\Requests\RotuloStoreRequest;
use App\Http\Requests\RotuloUpdateRequest;

class RotuloController extends Controller
{
    public function index(Request $request): RotuloCollection
    {
        $this->authorize('view-any', Rotulo::class);

        $search = $request->get('search', '');

        $rotulos = Rotulo::search($search)
            ->latest()
            ->paginate();

        return new RotuloCollection($rotulos);
    }

    public function store(RotuloStoreRequest $request): RotuloResource
    {
        $this->authorize('create', Rotulo::class);

        $validated = $request->validated();

        $rotulo = Rotulo::create($validated);

        return new RotuloResource($rotulo);
    }

    public function show(Request $request, Rotulo $rotulo): RotuloResource
    {
        $this->authorize('view', $rotulo);

        return new RotuloResource($rotulo);
    }

    public function update(
        RotuloUpdateRequest $request,
        Rotulo $rotulo
    ): RotuloResource {
        $this->authorize('update', $rotulo);

        $validated = $request->validated();

        $rotulo->update($validated);

        return new RotuloResource($rotulo);
    }

    public function destroy(Request $request, Rotulo $rotulo): Response
    {
        $this->authorize('delete', $rotulo);

        $rotulo->delete();

        return response()->noContent();
    }
}
