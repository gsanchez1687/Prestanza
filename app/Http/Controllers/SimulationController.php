<?php

namespace App\Http\Controllers;

use App\simulacionHipotecas;
use App\sysComunicacionesRegistros;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function simulation(){

        //Obtener destinatario de la tabla simulación_hipotecas
        //luego de obtener los destintacion con todas las condiciones que encontre, no puede ser todos
        //Condiciones par encontrar en la tabla de simulacion_hipotecas: estado = 0 and Condicion = 0 and Garantias <> 1 
        //y la fecha tiene que tener una anteguedad de 3 meses


        $simulacionHipotecas = simulacionHipotecas::where('estado','=','0')
        ->where('condicion','=','0')
        ->where('garantias','<>','1')
        ->where('Fecha_simulacion','<',date('Y-m-d', strtotime('-3 months')))
        ->limit(1)
        ->get();

        foreach($simulacionHipotecas as $data){

        //registrar en la tabla sys_comunicaciones_registros
        $id = $data->IdSimulacionHipotecas;
        $Identificador = 1;
        $tipo =3;
        sysComunicacionesRegistros::create([
           'tipo'=>3,
           'identificador'=>'',
           'idusuario'=>$data->IdUsuario,
           'idsimulacion'=>$data->IdSimulacionHipotecas,
           'condicion'=>0,
           'fecha'=>date('Y-m-d H:i:s'),
           'idusuario_envio'=>1,
           'reintento'=>0,
           'repuesta'=>'nose',
           'reenvio'=>0,
           'enlace'=>'/gestion-comunicaciones/controller/controller-sys-comunicaciones-envios.php?id='.$id.'&Identificador='.$Identificador.'&Tip=3&Canal=WS&Tipo=3&Destinatario=willyjaime90@gmail.com,3162063626&TipoComunicacion=Simuladores&IdCom=536',
           'enlace_encriptado'=>'nose',
           'observaciones'=>'nada'
        ]);

        }
    }
}
