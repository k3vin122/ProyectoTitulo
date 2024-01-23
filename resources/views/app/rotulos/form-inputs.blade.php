@php $editing = isset($rotulo) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="codigo"
            label="Código de Barra"
            :value="old('codigo', ($editing ? $rotulo->codigo : ''))"
            maxlength="255"
            placeholder="Codigo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="estado_rotulo_id" label="Estado" required>
            @php $selected = old('estado_rotulo_id', ($editing ? $rotulo->estado_rotulo_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selec...</option>
            @foreach($estadoRotulos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
