@php $editing = isset($movimiento) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="cinta_id" label="Cinta" required>
            @php $selected = old('cinta_id', ($editing ? $movimiento->cinta_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione Cinta</option>
            @foreach($cintas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="estado_movimiento_id"
            label="Estado Movimiento"
            required
        >
            @php $selected = old('estado_movimiento_id', ($editing ? $movimiento->estado_movimiento_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione un estado</option>
            @foreach($estadoMovimientos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="responsable_id" label="Técnico Responsable" required>
            @php $selected = old('responsable_id', ($editing ? $movimiento->responsable_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}> Responsable</option>
            @foreach($responsables as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="Funcionario TI" required>
            @php $selected = old('user_id', ($editing ? $movimiento->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione Funcionario</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
