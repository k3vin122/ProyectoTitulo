<?php

namespace App\Http\Controllers;

use App\Models\Rotulo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\EstadoRotulo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RotuloStoreRequest;
use App\Http\Requests\RotuloUpdateRequest;

class RotuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Rotulo::class);

        $search = $request->get('search', '');


        $rotulos = Rotulo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('app.rotulos.index', compact('rotulos', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Rotulo::class);

        $estadoRotulos = EstadoRotulo::pluck('desc', 'id');


        return view('app.rotulos.create', compact('estadoRotulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RotuloStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Rotulo::class);

        $validated = $request->validated();

        $rotulo = Rotulo::create($validated);

        return redirect()
            ->route('rotulos.edit', $rotulo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Rotulo $rotulo): View
    {
        $this->authorize('view', $rotulo);

        return view('app.rotulos.show', compact('rotulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Rotulo $rotulo): View
    {
        $this->authorize('update', $rotulo);

        $estadoRotulos = EstadoRotulo::pluck('desc', 'id');

        return view('app.rotulos.edit', compact('rotulo', 'estadoRotulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        RotuloUpdateRequest $request,
        Rotulo $rotulo
    ): RedirectResponse {
        $this->authorize('update', $rotulo);

        $validated = $request->validated();

        $rotulo->update($validated);

        return redirect()
            ->route('rotulos.edit', $rotulo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Rotulo $rotulo): RedirectResponse
    {
        $this->authorize('delete', $rotulo);

        $rotulo->delete();

        return redirect()
            ->route('rotulos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
