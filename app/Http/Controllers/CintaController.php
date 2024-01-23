<?php

namespace App\Http\Controllers;

use App\Models\Cinta;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\IngresoCintaSnRotulo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CintaStoreRequest;
use App\Http\Requests\CintaUpdateRequest;

class CintaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Cinta::class);

        $search = $request->get('search', '');

        $cintas = Cinta::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.cintas.index', compact('cintas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Cinta::class);

        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::pluck('serie', 'id');

        return view('app.cintas.create', compact('ingresoCintaSnRotulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CintaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Cinta::class);

        $validated = $request->validated();

        $cinta = Cinta::create($validated);

        return redirect()
            ->route('cintas.edit', $cinta)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Cinta $cinta): View
    {
        $this->authorize('view', $cinta);

        return view('app.cintas.show', compact('cinta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Cinta $cinta): View
    {
        $this->authorize('update', $cinta);

        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::pluck('serie', 'id');

        return view(
            'app.cintas.edit',
            compact('cinta', 'ingresoCintaSnRotulos')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CintaUpdateRequest $request,
        Cinta $cinta
    ): RedirectResponse {
        $this->authorize('update', $cinta);

        $validated = $request->validated();

        $cinta->update($validated);

        return redirect()
            ->route('cintas.edit', $cinta)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cinta $cinta): RedirectResponse
    {
        $this->authorize('delete', $cinta);

        $cinta->delete();

        return redirect()
            ->route('cintas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
