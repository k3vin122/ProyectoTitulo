@php $editing = isset($estadoRotulo) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="desc"
            label="Desc"
            :value="old('desc', ($editing ? $estadoRotulo->desc : ''))"
            maxlength="255"
            placeholder="Desc"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
