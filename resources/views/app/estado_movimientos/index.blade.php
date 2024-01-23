@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
               







            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\EstadoMovimiento::class)
                <a
                    href="{{ route('estado-movimientos.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('Nuevo Registro')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('Lista Estados de movimientos')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('Descripción')
                            </th>
                            <th class="text-center">
                                @lang('Acción')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estadoMovimientos as $estadoMovimiento)
                        <tr>
                            <td>{{ $estadoMovimiento->desc ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $estadoMovimiento)
                                    <a
                                        href="{{ route('estado-movimientos.edit', $estadoMovimiento) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                              
                                    @endcan @can('delete', $estadoMovimiento)
                                    <form
                                        action="{{ route('estado-movimientos.destroy', $estadoMovimiento) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                {!! $estadoMovimientos->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
