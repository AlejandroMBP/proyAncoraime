<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class metricascontroller extends Controller
{
    public function index()
    {
        return view('modulos.metricas.metricas');
    }
}
