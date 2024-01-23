@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('ingreso-cinta-sn-rotulos.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.ingreso_cinta_sn_rotulos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.ingreso_cinta_sn_rotulos.inputs.serie')</h5>
                    <span>{{ $ingresoCintaSnRotulo->serie ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.ingreso_cinta_sn_rotulos.inputs.almacenamiento')
                    </h5>
                    <span
                        >{{ $ingresoCintaSnRotulo->almacenamiento ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.ingreso_cinta_sn_rotulos.inputs.marca')</h5>
                    <span>{{ $ingresoCintaSnRotulo->marca ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.ingreso_cinta_sn_rotulos.inputs.estado_sn_rotulo_id')
                    </h5>
                    <span
                        >{{
                        optional($ingresoCintaSnRotulo->estadoSnRotulo)->desc ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.ingreso_cinta_sn_rotulos.inputs.rotulo_id')
                    </h5>
                    <span
                        >{{ optional($ingresoCintaSnRotulo->rotulo)->codigo ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('ingreso-cinta-sn-rotulos.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\IngresoCintaSnRotulo::class)
                <a
                    href="{{ route('ingreso-cinta-sn-rotulos.create') }}"
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
