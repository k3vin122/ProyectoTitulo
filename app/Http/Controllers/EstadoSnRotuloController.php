<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\EstadoSnRotulo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EstadoSnRotuloStoreRequest;
use App\Http\Requests\EstadoSnRotuloUpdateRequest;

class EstadoSnRotuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', EstadoSnRotulo::class);

        $search = $request->get('search', '');

        $estadoSnRotulos = EstadoSnRotulo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.estado_sn_rotulos.index',
            compact('estadoSnRotulos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', EstadoSnRotulo::class);

        return view('app.estado_sn_rotulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoSnRotuloStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', EstadoSnRotulo::class);

        $validated = $request->validated();

        $estadoSnRotulo = EstadoSnRotulo::create($validated);

        return redirect()
            ->route('estado-sn-rotulos.edit', $estadoSnRotulo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, EstadoSnRotulo $estadoSnRotulo): View
    {
        $this->authorize('view', $estadoSnRotulo);

        return view('app.estado_sn_rotulos.show', compact('estadoSnRotulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, EstadoSnRotulo $estadoSnRotulo): View
    {
        $this->authorize('update', $estadoSnRotulo);

        return view('app.estado_sn_rotulos.edit', compact('estadoSnRotulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        EstadoSnRotuloUpdateRequest $request,
        EstadoSnRotulo $estadoSnRotulo
    ): RedirectResponse {
        $this->authorize('update', $estadoSnRotulo);

        $validated = $request->validated();

        $estadoSnRotulo->update($validated);

        return redirect()
            ->route('estado-sn-rotulos.edit', $estadoSnRotulo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        EstadoSnRotulo $estadoSnRotulo
    ): RedirectResponse {
        $this->authorize('delete', $estadoSnRotulo);

        $estadoSnRotulo->delete();

        return redirect()
            ->route('estado-sn-rotulos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
