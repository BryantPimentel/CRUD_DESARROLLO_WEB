<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'ejemplo' => [
        'title' => 'Ejemplo',

        'actions' => [
            'index' => 'Ejemplo',
            'create' => 'New Ejemplo',
            'edit' => 'Edit :name',
            'will_be_published' => 'Ejemplo will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'perex' => 'Perex',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'producto' => 'Producto',
            'id_marca' => 'Id marca',
            'descripcion' => 'Descripcion',
            'precio_costo' => 'Precio costo',
            'precio_venta' => 'Precio venta',
            'existencia' => 'Existencia',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_producto' => 'Id producto',
            'producto' => 'Producto',
            'id_marca' => 'Id marca',
            'descripcion' => 'Descripcion',
            'precio_costo' => 'Precio costo',
            'precio_venta' => 'Precio venta',
            'existencia' => 'Existencia',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'producto' => 'Producto',
            'id_marca' => 'Id marca',
            'descripcion' => 'Descripcion',
            'precio_costo' => 'Precio costo',
            'precio_venta' => 'Precio venta',
            'existencia' => 'Existencia',
            
        ],
    ],

    'marca' => [
        'title' => 'Marca',

        'actions' => [
            'index' => 'Marca',
            'create' => 'New Marca',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'marca' => 'Marca',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];