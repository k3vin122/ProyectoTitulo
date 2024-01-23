@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('responsables.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.responsables.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.responsables.inputs.rut')</h5>
                    <span>{{ $responsable->rut ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.responsables.inputs.nombre')</h5>
                    <span>{{ $responsable->nombre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.responsables.inputs.telefono')</h5>
                    <span>{{ $responsable->telefono ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.responsables.inputs.empresa_id')</h5>
                    <span
                        >{{ optional($responsable->empresa)->rol ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('responsables.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Responsable::class)
                <a
                    href="{{ route('responsables.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
