<?php

namespace App\Http\Controllers;

use App\Models\Rotulo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\EstadoSnRotulo;
use App\Models\IngresoCintaSnRotulo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\IngresoCintaSnRotuloStoreRequest;
use App\Http\Requests\IngresoCintaSnRotuloUpdateRequest;

class IngresoCintaSnRotuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', IngresoCintaSnRotulo::class);

        $search = $request->get('search', '');

        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.ingreso_cinta_sn_rotulos.index',
            compact('ingresoCintaSnRotulos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', IngresoCintaSnRotulo::class);

        $estadoSnRotulos = EstadoSnRotulo::pluck('desc', 'id');
        $rotulos = Rotulo::pluck('codigo', 'id');

        return view(
            'app.ingreso_cinta_sn_rotulos.create',
            compact('estadoSnRotulos', 'rotulos')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        IngresoCintaSnRotuloStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', IngresoCintaSnRotulo::class);

        $validated = $request->validated();

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::create($validated);

        return redirect()
            ->route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): View {
        $this->authorize('view', $ingresoCintaSnRotulo);

        return view(
            'app.ingreso_cinta_sn_rotulos.show',
            compact('ingresoCintaSnRotulo')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): View {
        $this->authorize('update', $ingresoCintaSnRotulo);

        $estadoSnRotulos = EstadoSnRotulo::pluck('desc', 'id');
        $rotulos = Rotulo::pluck('codigo', 'id');

        return view(
            'app.ingreso_cinta_sn_rotulos.edit',
            compact('ingresoCintaSnRotulo', 'estadoSnRotulos', 'rotulos')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        IngresoCintaSnRotuloUpdateRequest $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): RedirectResponse {
        $this->authorize('update', $ingresoCintaSnRotulo);

        $validated = $request->validated();

        $ingresoCintaSnRotulo->update($validated);

        return redirect()
            ->route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): RedirectResponse {
        $this->authorize('delete', $ingresoCintaSnRotulo);

        $ingresoCintaSnRotulo->delete();

        return redirect()
            ->route('ingreso-cinta-sn-rotulos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
