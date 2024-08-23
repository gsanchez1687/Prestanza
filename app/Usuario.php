<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";

    protected $fillable = [
        'IdUsusario',
        'Usuario',
        'Clave',
        'Nivel',
        'Baneo',
        'F_Creacion',
        'F_Modificado',
        'Nombre',
        'Apellido',
        'Cedula',
        'Correo',
        'Tipo_Documento',
        'identificador_celular',
        'Celular'
    ];
}
