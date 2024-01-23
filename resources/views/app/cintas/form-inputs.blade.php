@php $editing = isset($cinta) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="codigo"
            label="Codigo"
            :value="old('codigo', ($editing ? $cinta->codigo : ''))"
            maxlength="255"
            placeholder="Codigo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="almacenamiento"
            label="Almacenamiento"
            :value="old('almacenamiento', ($editing ? $cinta->almacenamiento : ''))"
            maxlength="255"
            placeholder="Almacenamiento"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="marca"
            label="Marca"
            :value="old('marca', ($editing ? $cinta->marca : ''))"
            maxlength="255"
            placeholder="Marca"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="ingreso_cinta_sn_rotulo_id"
            label="Ingreso Cinta Sn Rotulo"
            required
        >
            @php $selected = old('ingreso_cinta_sn_rotulo_id', ($editing ? $cinta->ingreso_cinta_sn_rotulo_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Ingreso Cinta Sn Rotulo</option>
            @foreach($ingresoCintaSnRotulos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
