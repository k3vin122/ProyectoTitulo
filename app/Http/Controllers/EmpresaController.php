<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Empresa::class);

        $search = $request->get('search', '');

        $empresas = Empresa::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.empresas.index', compact('empresas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Empresa::class);

        return view('app.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Empresa::class);

        $validated = $request->validated();

        $empresa = Empresa::create($validated);

        return redirect()
            ->route('empresas.edit', $empresa)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Empresa $empresa): View
    {
        $this->authorize('view', $empresa);

        return view('app.empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Empresa $empresa): View
    {
        $this->authorize('update', $empresa);

        return view('app.empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        EmpresaUpdateRequest $request,
        Empresa $empresa
    ): RedirectResponse {
        $this->authorize('update', $empresa);

        $validated = $request->validated();

        $empresa->update($validated);

        return redirect()
            ->route('empresas.edit', $empresa)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Empresa $empresa
    ): RedirectResponse {
        $this->authorize('delete', $empresa);

        $empresa->delete();

        return redirect()
            ->route('empresas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
