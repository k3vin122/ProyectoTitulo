@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('estado-movimientos.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.estado_movimientos.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('estado-movimientos.update', $estadoMovimiento) }}"
                class="mt-4"
            >
                @include('app.estado_movimientos.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('estado-movimientos.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('Salir')
                    </a>

                    <a
                        href="{{ route('estado-movimientos.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('Nuevo')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('Actualizar')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
