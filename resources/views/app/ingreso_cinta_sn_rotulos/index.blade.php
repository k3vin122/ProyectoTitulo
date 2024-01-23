@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\IngresoCintaSnRotulo::class)
                <a
                    href="{{ route('ingreso-cinta-sn-rotulos.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('Ingresar Nueva Cinta ')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('Lista de Cintas Nuevas')
                </h4>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('N° serie')
                            </th>
                            <th class="text-left">
                                @lang('crud.ingreso_cinta_sn_rotulos.inputs.almacenamiento')
                            </th>
                            <th class="text-left">
                                @lang('crud.ingreso_cinta_sn_rotulos.inputs.marca')
                            </th>
                            <th class="text-left">
                                @lang('Estado')
                            </th>
                            <th class="text-left">
                                @lang('Rótulo')
                            </th>
                            <th class="text-center">
                                @lang('Ingresado')
                            </th>
                            <th class="text-center">
                                @lang('Acción')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ingresoCintaSnRotulos as
                        $ingresoCintaSnRotulo)
                        <tr>
                            <td>{{ $ingresoCintaSnRotulo->serie ?? '-' }}</td>
                            <td>
                                {{ $ingresoCintaSnRotulo->almacenamiento ?? '-'
                                }}
                            </td>
                            <td>{{ $ingresoCintaSnRotulo->marca ?? '-' }}</td>
                            <td>
                                {{
                                optional($ingresoCintaSnRotulo->estadoSnRotulo)->desc
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($ingresoCintaSnRotulo->rotulo)->codigo
                                ?? '-' }}
                            </td>

                            <td>
                                {{
                                optional($ingresoCintaSnRotulo->rotulo)->created_at
                                ?? '-' }}
                            </td>

                            
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $ingresoCintaSnRotulo)
                                    <a
                                        href="{{ route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                  
                                    @endcan @can('delete',
                                    $ingresoCintaSnRotulo)
                                    <form
                                        action="{{ route('ingreso-cinta-sn-rotulos.destroy', $ingresoCintaSnRotulo) }}"
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
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $ingresoCintaSnRotulos->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
