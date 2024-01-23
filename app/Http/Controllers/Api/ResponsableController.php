<?php

namespace App\Http\Controllers\Api;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResponsableResource;
use App\Http\Resources\ResponsableCollection;
use App\Http\Requests\ResponsableStoreRequest;
use App\Http\Requests\ResponsableUpdateRequest;

class ResponsableController extends Controller
{
    public function index(Request $request): ResponsableCollection
    {
        $this->authorize('view-any', Responsable::class);

        $search = $request->get('search', '');

        $responsables = Responsable::search($search)
            ->latest()
            ->paginate();

        return new ResponsableCollection($responsables);
    }

    public function store(ResponsableStoreRequest $request): ResponsableResource
    {
        $this->authorize('create', Responsable::class);

        $validated = $request->validated();

        $responsable = Responsable::create($validated);

        return new ResponsableResource($responsable);
    }

    public function show(
        Request $request,
        Responsable $responsable
    ): ResponsableResource {
        $this->authorize('view', $responsable);

        return new ResponsableResource($responsable);
    }

    public function update(
        ResponsableUpdateRequest $request,
        Responsable $responsable
    ): ResponsableResource {
        $this->authorize('update', $responsable);

        $validated = $request->validated();

        $responsable->update($validated);

        return new ResponsableResource($responsable);
    }

    public function destroy(
        Request $request,
        Responsable $responsable
    ): Response {
        $this->authorize('delete', $responsable);

        $responsable->delete();

        return response()->noContent();
    }
}
