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
                @lang('Ingeso de cinta')
            </h4>

            <x-form
                method="POST"
                action="{{ route('ingreso-cinta-sn-rotulos.store') }}"
                class="mt-4"
            >
                @include('app.ingreso_cinta_sn_rotulos.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('ingreso-cinta-sn-rotulos.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('Salir')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('Guardar')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
