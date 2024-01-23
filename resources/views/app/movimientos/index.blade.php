@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                 
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Movimiento::class)
                <a
                    href="{{ route('movimientos.create') }}"
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
                    @lang('Lista de Movimientos')
                </h4>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.movimientos.inputs.cinta_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.movimientos.inputs.estado_movimiento_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.movimientos.inputs.responsable_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.movimientos.inputs.user_id')
                            </th>
                            <th class="text-center">
                                @lang('Acción')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movimientos as $movimiento)
                        <tr>
                            <td>
                                {{ optional($movimiento->cinta)->codigo ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($movimiento->estadoMovimiento)->desc
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($movimiento->responsable)->nombre ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($movimiento->user)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $movimiento)
                                    <a
                                        href="{{ route('movimientos.edit', $movimiento) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                 
                                    
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">{!! $movimientos->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div align="center"><img src="\hpm2.png"></div>

@endsection
