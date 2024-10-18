<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class documentosController extends Controller
{
    public function index()
    {
        return view('Administrador.documentos.index');
    }
}
