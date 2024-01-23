<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cinta;
use Illuminate\View\View;
use App\Models\Movimiento;
use App\Models\Responsable;
use Illuminate\Http\Request;
use App\Models\EstadoMovimiento;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MovimientoStoreRequest;
use App\Http\Requests\MovimientoUpdateRequest;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Movimiento::class);

        $search = $request->get('search', '');

        $movimientos = Movimiento::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.movimientos.index', compact('movimientos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Movimiento::class);

        $cintas = Cinta::pluck('codigo', 'id');
        $estadoMovimientos = EstadoMovimiento::pluck('desc', 'id');
        $responsables = Responsable::pluck('rut', 'id');
        $users = User::pluck('name', 'id');

      



        return view(
            'app.movimientos.create',
            compact('cintas', 'estadoMovimientos', 'responsables', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovimientoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validated();

        $movimiento = Movimiento::create($validated);

        return redirect()
            ->route('movimientos.edit', $movimiento)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Movimiento $movimiento): View
    {
        $this->authorize('view', $movimiento);

        return view('app.movimientos.show', compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Movimiento $movimiento): View
    {
        $this->authorize('update', $movimiento);

        $cintas = Cinta::pluck('codigo', 'id');
        $estadoMovimientos = EstadoMovimiento::pluck('desc', 'id');
        $responsables = Responsable::pluck('rut', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.movimientos.edit',
            compact(
                'movimiento',
                'cintas',
                'estadoMovimientos',
                'responsables',
                'users'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MovimientoUpdateRequest $request,
        Movimiento $movimiento
    ): RedirectResponse {
        $this->authorize('update', $movimiento);

        $validated = $request->validated();

        $movimiento->update($validated);

        return redirect()
            ->route('movimientos.edit', $movimiento)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Movimiento $movimiento
    ): RedirectResponse {
        $this->authorize('delete', $movimiento);

        $movimiento->delete();

        return redirect()
            ->route('movimientos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
