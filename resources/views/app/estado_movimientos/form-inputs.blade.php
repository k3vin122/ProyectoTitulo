@php $editing = isset($estadoMovimiento) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="desc"
            label="Descripción"
            :value="old('desc', ($editing ? $estadoMovimiento->desc : ''))"
            maxlength="255"
            placeholder="Desc"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
