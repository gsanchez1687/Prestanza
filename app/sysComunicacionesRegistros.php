<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysComunicacionesRegistros extends Model
{
    public $timestamps = false;
    protected $table = 'sys_comunicaciones_registros';
    protected $fillable = [
        'id',
        'tipo',
        'identificador',
        'idusuario',
        'idsimulacion',
        'condicion',
        'fecha',
        'fecha_envio',
        'idusuario_envio',
        'reintento',
        'fecha_reintento',
        'repuesta',
        'reenvio',
        'fecha_reenvio',
        'enlace',
        'enlace_encriptado',
        'observaciones'
    ];
}
