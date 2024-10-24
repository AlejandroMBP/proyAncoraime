<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prestamosController extends Controller
{
    public function index()
    {
        return view('Administrador.prestamos.index');
    }
}
