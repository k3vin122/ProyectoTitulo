@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cintas.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cintas.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cintas.inputs.codigo')</h5>
                    <span>{{ $cinta->codigo ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cintas.inputs.almacenamiento')</h5>
                    <span>{{ $cinta->almacenamiento ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cintas.inputs.marca')</h5>
                    <span>{{ $cinta->marca ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.cintas.inputs.ingreso_cinta_sn_rotulo_id')
                    </h5>
                    <span
                        >{{ optional($cinta->ingresoCintaSnRotulo)->serie ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cintas.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Cinta::class)
                <a href="{{ route('cintas.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
