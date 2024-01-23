@php $editing = isset($ingresoCintaSnRotulo) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="serie"
            label="Número de serie"
            :value="old('serie', ($editing ? $ingresoCintaSnRotulo->serie : ''))"
            maxlength="255"
            placeholder="Serie"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="almacenamiento"
            label="Almacenamiento"
            :value="old('almacenamiento', ($editing ? $ingresoCintaSnRotulo->almacenamiento : '15TB'))"
            maxlength="255"
            placeholder="Almacenamiento"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="marca"
            label="Marca"
            :value="old('marca', ($editing ? $ingresoCintaSnRotulo->marca : 'Genérica'))"
            maxlength="255"
            placeholder="Marca"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="estado_sn_rotulo_id"
            label="Estado"
            required
        >
            @php $selected = old('estado_sn_rotulo_id', ($editing ? $ingresoCintaSnRotulo->estado_sn_rotulo_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selec...</option>
            @foreach($estadoSnRotulos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : 'En Proceso' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group   class="col-sm-12">

            <x-inputs.select name="rotulo_id" class="js-example-basic-single" label="Rótulo" required>
                @php $selected = old('rotulo_id',  ($editing ? $ingresoCintaSnRotulo->rotulo_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}></option>
                @foreach($rotulos as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.select>


       
    </x-inputs.group>

    
</div>



