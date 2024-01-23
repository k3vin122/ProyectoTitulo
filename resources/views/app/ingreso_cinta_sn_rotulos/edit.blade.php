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
                @lang('crud.ingreso_cinta_sn_rotulos.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('ingreso-cinta-sn-rotulos.update', $ingresoCintaSnRotulo) }}"
                class="mt-4"
            >
                @include('app.ingreso_cinta_sn_rotulos.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('ingreso-cinta-sn-rotulos.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('ingreso-cinta-sn-rotulos.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
