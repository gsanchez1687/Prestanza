<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\simulacionHipotecas;
use App\sysComunicaciones;
use App\sysComunicacionesRegistros;

class ProcessSimulation implements ShouldQueue
{
    public $timeout = 3600;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Obtener destinatario de la tabla simulación_hipotecas
        //luego de obtener los destintacion con todas las condiciones que encontre, no puede ser todos
        //Condiciones par encontrar en la tabla de simulacion_hipotecas: estado = 0 and Condicion = 0 and Garantias <> 1 
        //y la fecha tiene que tener una anteguedad de 3 meses

        $simulacionHipotecas = simulacionHipotecas::where('estado','=','0')
        ->where('condicion','=','0')
        ->where('garantias','<>','1')
        ->where('Fecha_simulacion','>',date('Y-m-d', strtotime('-3 months')))
        ->limit(1)
        ->get();

        $sysComunicaciones = sysComunicaciones::where('idCom','=','91')->first();

        foreach($simulacionHipotecas as $data){

        //registrar en la tabla sys_comunicaciones_registros
        //parametros del campo enlace
        $id = $data->IdSimulacionHipotecas;
        $Identificador = 1;
        $tipo =3;
        //email y telefono del usuario separado por comas
        $emailTelefono = $data->Email.','.$data->Celular;
        sysComunicacionesRegistros::create([
           'tipo'=>3,
           'identificador'=>$sysComunicaciones->Identificador,
           'idusuario'=>$data->IdUsuario,
           'idsimulacion'=>$data->IdSimulacionHipotecas,
           'condicion'=>0,
           'fecha'=>date('Y-m-d H:i:s'),
           'idusuario_envio'=>1,
           'reintento'=>0,
           'repuesta'=>'nose',
           'reenvio'=>0,
           'enlace'=>'/gestion-comunicaciones/controller/controller-sys-comunicaciones-envios.php?id='.$id.'&Identificador='.$Identificador.'&Tip=3&Canal=WS&Tipo='.$tipo.'&Destinatario='.$emailTelefono.'&TipoComunicacion=Simuladores&IdCom=91',
           'enlace_encriptado'=>'Guillermo',
           'observaciones'=>'Guillermo'
        ]);

        }
    }
}
