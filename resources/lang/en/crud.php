<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'cintas' => [
        'name' => 'Cintas',
        'index_title' => 'Cintas List',
        'new_title' => 'New Cinta',
        'create_title' => 'Create Cinta',
        'edit_title' => 'Edit Cinta',
        'show_title' => 'Show Cinta',
        'inputs' => [
            'codigo' => 'Codigo',
            'almacenamiento' => 'Almacenamiento',
            'marca' => 'Marca',
            'ingreso_cinta_sn_rotulo_id' => 'Ingreso Cinta Sn Rotulo',
        ],
    ],

    'empresas' => [
        'name' => 'Empresas',
        'index_title' => 'Empresas List',
        'new_title' => 'New Empresa',
        'create_title' => 'Create Empresa',
        'edit_title' => 'Edit Empresa',
        'show_title' => 'Show Empresa',
        'inputs' => [
            'rol' => 'Rol',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ],
    ],

    'estado_movimientos' => [
        'name' => 'Estado Movimientos',
        'index_title' => 'EstadoMovimientos List',
        'new_title' => 'New Estado movimiento',
        'create_title' => 'Create EstadoMovimiento',
        'edit_title' => 'Edit EstadoMovimiento',
        'show_title' => 'Show EstadoMovimiento',
        'inputs' => [
            'desc' => 'Desc',
        ],
    ],

    'estado_rotulos' => [
        'name' => 'Estado Rotulos',
        'index_title' => 'EstadoRotulos List',
        'new_title' => 'New Estado rotulo',
        'create_title' => 'Create EstadoRotulo',
        'edit_title' => 'Edit EstadoRotulo',
        'show_title' => 'Show EstadoRotulo',
        'inputs' => [
            'desc' => 'Desc',
        ],
    ],

    'estado_sn_rotulos' => [
        'name' => 'Estado Sn Rotulos',
        'index_title' => 'EstadoSnRotulos List',
        'new_title' => 'New Estado sn rotulo',
        'create_title' => 'Create EstadoSnRotulo',
        'edit_title' => 'Edit EstadoSnRotulo',
        'show_title' => 'Show EstadoSnRotulo',
        'inputs' => [
            'desc' => 'Desc',
        ],
    ],

    'ingreso_cinta_sn_rotulos' => [
        'name' => 'Ingreso Cinta Sn Rotulos',
        'index_title' => 'IngresoCintaSnRotulos List',
        'new_title' => 'New Ingreso cinta sn rotulo',
        'create_title' => 'Create IngresoCintaSnRotulo',
        'edit_title' => 'Edit IngresoCintaSnRotulo',
        'show_title' => 'Show IngresoCintaSnRotulo',
        'inputs' => [
            'serie' => 'Serie',
            'almacenamiento' => 'Almacenamiento',
            'marca' => 'Marca',
            'estado_sn_rotulo_id' => 'Estado Sn Rotulo',
            'rotulo_id' => 'Rotulo',
        ],
    ],

    'movimientos' => [
        'name' => 'Movimientos',
        'index_title' => 'Movimientos List',
        'new_title' => 'New Movimiento',
        'create_title' => 'Create Movimiento',
        'edit_title' => 'Edit Movimiento',
        'show_title' => 'Show Movimiento',
        'inputs' => [
            'cinta_id' => 'Cinta',
            'estado_movimiento_id' => 'Estado Movimiento',
            'responsable_id' => 'Responsable',
            'user_id' => 'User',
        ],
    ],

    'responsables' => [
        'name' => 'Responsables',
        'index_title' => 'Responsables List',
        'new_title' => 'New Responsable',
        'create_title' => 'Create Responsable',
        'edit_title' => 'Edit Responsable',
        'show_title' => 'Show Responsable',
        'inputs' => [
            'rut' => 'Rut',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'empresa_id' => 'Empresa',
        ],
    ],

    'rotulos' => [
        'name' => 'Rotulos',
        'index_title' => 'Rotulos List',
        'new_title' => 'New Rotulo',
        'create_title' => 'Create Rotulo',
        'edit_title' => 'Edit Rotulo',
        'show_title' => 'Show Rotulo',
        'inputs' => [
            'codigo' => 'Codigo',
            'estado_rotulo_id' => 'Estado Rotulo',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],
];
