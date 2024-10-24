<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class impresionesController extends Controller
{
    public function index()
    {
        return view('Administrador.impresiones.index');
    }
}
