<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Facades\Validator;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::where('estado','!=','eliminado')
        ->orderBy('id', 'DESC')
        ->get();
        return view('Administrador.cargos.listar', ['cargos'=>$cargos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cargo = Cargo::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion ?? ' ',
            'estado' => 'activo',
            'usuario_id' => 1,
        ]);
        return back()->with('listo','se ha insertado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cargo = Cargo::findOrFail($id);

        $cargo->estado = 'eliminado'; 

        $cargo->save();

        return back()->with('listo','se elimino correctamente');
    }
}
