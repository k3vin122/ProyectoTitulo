@php $editing = isset($empresa) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="rol"
            label="Rol"
            :value="old('rol', ($editing ? $empresa->rol : ''))"
            maxlength="255"
            placeholder="Rol"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nombre"
            label="Nombre"
            :value="old('nombre', ($editing ? $empresa->nombre : ''))"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="direccion"
            label="Direccion"
            :value="old('direccion', ($editing ? $empresa->direccion : ''))"
            maxlength="255"
            placeholder="Direccion"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telefono"
            label="Telefono"
            :value="old('telefono', ($editing ? $empresa->telefono : ''))"
            maxlength="255"
            placeholder="Telefono"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="correo"
            label="Correo"
            :value="old('correo', ($editing ? $empresa->correo : ''))"
            maxlength="255"
            placeholder="Correo"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
