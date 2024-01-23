@php $editing = isset($responsable) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="rut"
            label="Rut"
            :value="old('rut', ($editing ? $responsable->rut : ''))"
            maxlength="255"
            placeholder="Rut"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nombre"
            label="Nombre"
            :value="old('nombre', ($editing ? $responsable->nombre : ''))"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telefono"
            label="Telefono"
            :value="old('telefono', ($editing ? $responsable->telefono : ''))"
            maxlength="255"
            placeholder="Telefono"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="empresa_id" label="Empresa" required>
            @php $selected = old('empresa_id', ($editing ? $responsable->empresa_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Empresa</option>
            @foreach($empresas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
