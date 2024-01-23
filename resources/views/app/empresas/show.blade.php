@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('empresas.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.empresas.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.empresas.inputs.rol')</h5>
                    <span>{{ $empresa->rol ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.empresas.inputs.nombre')</h5>
                    <span>{{ $empresa->nombre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.empresas.inputs.direccion')</h5>
                    <span>{{ $empresa->direccion ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.empresas.inputs.telefono')</h5>
                    <span>{{ $empresa->telefono ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.empresas.inputs.correo')</h5>
                    <span>{{ $empresa->correo ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('empresas.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Empresa::class)
                <a href="{{ route('empresas.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
