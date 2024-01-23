<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\EstadoRotulo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EstadoRotuloStoreRequest;
use App\Http\Requests\EstadoRotuloUpdateRequest;

class EstadoRotuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', EstadoRotulo::class);

        $search = $request->get('search', '');

        $estadoRotulos = EstadoRotulo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.estado_rotulos.index',
            compact('estadoRotulos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', EstadoRotulo::class);

        return view('app.estado_rotulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoRotuloStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', EstadoRotulo::class);

        $validated = $request->validated();

        $estadoRotulo = EstadoRotulo::create($validated);

        return redirect()
            ->route('estado-rotulos.edit', $estadoRotulo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, EstadoRotulo $estadoRotulo): View
    {
        $this->authorize('view', $estadoRotulo);

        return view('app.estado_rotulos.show', compact('estadoRotulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, EstadoRotulo $estadoRotulo): View
    {
        $this->authorize('update', $estadoRotulo);

        return view('app.estado_rotulos.edit', compact('estadoRotulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        EstadoRotuloUpdateRequest $request,
        EstadoRotulo $estadoRotulo
    ): RedirectResponse {
        $this->authorize('update', $estadoRotulo);

        $validated = $request->validated();

        $estadoRotulo->update($validated);

        return redirect()
            ->route('estado-rotulos.edit', $estadoRotulo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        EstadoRotulo $estadoRotulo
    ): RedirectResponse {
        $this->authorize('delete', $estadoRotulo);

        $estadoRotulo->delete();

        return redirect()
            ->route('estado-rotulos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
