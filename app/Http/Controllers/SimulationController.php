<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessSimulation;

class SimulationController extends Controller
{
    public function simulation(){

       // dispatch(new ProcessSimulation());
        ProcessSimulation::dispatch();
    }
}
