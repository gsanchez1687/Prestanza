<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysComunicaciones extends Model
{
    protected $table = 'sys_comunicaciones';
    protected $fillable = [
        'idCom',
        'Tipo',
        'TipoComunicacion',
        'Canal',
        'Identificador',
        'Ref1',
        'Ref2',
        'Ref3',
        'Ref4',
        'Cuerpo',
        'NoEnvios',
        'Grupo',
        'Costo',
        'FechaModificacion',
        'Observaciones'
    ];
}
