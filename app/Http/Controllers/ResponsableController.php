<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\View\View;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ResponsableStoreRequest;
use App\Http\Requests\ResponsableUpdateRequest;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Responsable::class);

        $search = $request->get('search', '');

        $responsables = Responsable::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.responsables.index',
            compact('responsables', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Responsable::class);

        $empresas = Empresa::pluck('rol', 'id');

        return view('app.responsables.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponsableStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Responsable::class);

        $validated = $request->validated();

        $responsable = Responsable::create($validated);

        return redirect()
            ->route('responsables.edit', $responsable)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Responsable $responsable): View
    {
        $this->authorize('view', $responsable);

        return view('app.responsables.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Responsable $responsable): View
    {
        $this->authorize('update', $responsable);

        $empresas = Empresa::pluck('rol', 'id');

        return view(
            'app.responsables.edit',
            compact('responsable', 'empresas')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ResponsableUpdateRequest $request,
        Responsable $responsable
    ): RedirectResponse {
        $this->authorize('update', $responsable);

        $validated = $request->validated();

        $responsable->update($validated);

        return redirect()
            ->route('responsables.edit', $responsable)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Responsable $responsable
    ): RedirectResponse {
        $this->authorize('delete', $responsable);

        $responsable->delete();

        return redirect()
            ->route('responsables.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
