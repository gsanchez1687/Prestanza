<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysComunicacionesLog extends Model
{
    protected $table = 'sys_comunicaciones_log';
    protected $fillable = [
        'IdComLog',
        'IdUsuario',
        'IdCom',
        'IdSimulacion',
        'Ref1',
        'Ref2',
        'Fecha',
        'Hora',
        'Usuario',
        'Observaciones',
        'idregistro'
    ];
}
