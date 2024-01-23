<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\EstadoMovimiento;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EstadoMovimientoStoreRequest;
use App\Http\Requests\EstadoMovimientoUpdateRequest;

class EstadoMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', EstadoMovimiento::class);

        $search = $request->get('search', '');

        $estadoMovimientos = EstadoMovimiento::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.estado_movimientos.index',
            compact('estadoMovimientos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', EstadoMovimiento::class);

        return view('app.estado_movimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        EstadoMovimientoStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', EstadoMovimiento::class);

        $validated = $request->validated();

        $estadoMovimiento = EstadoMovimiento::create($validated);

        return redirect()
            ->route('estado-movimientos.edit', $estadoMovimiento)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): View {
        $this->authorize('view', $estadoMovimiento);

        return view('app.estado_movimientos.show', compact('estadoMovimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): View {
        $this->authorize('update', $estadoMovimiento);

        return view('app.estado_movimientos.edit', compact('estadoMovimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        EstadoMovimientoUpdateRequest $request,
        EstadoMovimiento $estadoMovimiento
    ): RedirectResponse {
        $this->authorize('update', $estadoMovimiento);

        $validated = $request->validated();

        $estadoMovimiento->update($validated);

        return redirect()
            ->route('estado-movimientos.edit', $estadoMovimiento)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): RedirectResponse {
        $this->authorize('delete', $estadoMovimiento);

        $estadoMovimiento->delete();

        return redirect()
            ->route('estado-movimientos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
