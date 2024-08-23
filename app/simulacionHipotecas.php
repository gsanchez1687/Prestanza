<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class simulacionHipotecas extends Model
{
    protected $table = 'simulacion_hipotecas';
    protected $fillable = [
        'IdSimulacionHipotecas',
        'IdUsuario',
        'IdCodeudores',
        'IdBanco',
        'IdInmueble',
        'Tipo_Inmueble',
        'Ano_Contruidos',
        'Metros',
        'Pisos',
        'Estrato',
        'Afectacion',
        'Especifique_Afectacion',
        'Afectacion_Otra',
        'Valor_Comercial',
        'Pais',
        'Departamento',
        'Municipio',
        'Localidad',
        'Direccion',
        'Uso'
    ];

    //relaciones

    public function sysComunicacionesRegistros(){
        return $this->belongsTo(sysComunicacionesRegistros::class,'IdSimulacionHipotecas');
    }

    //usuario

    public function usuario(){
        return $this->belongsTo(Usuario::class,'IdUsuario');
    }

}
