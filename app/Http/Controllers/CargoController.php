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
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Consultar los cargos, filtrando si se proporciona un término de búsqueda
        $cargos = Cargo::when($search, function ($query) use ($search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);
    
        // Verificar si la solicitud es AJAX
        if ($request->ajax()) {
            return view('Administrador.cargos.tablaCargos', compact('cargos'));
        }
        return view('Administrador.cargos.listar', ['cargos' => $cargos],['search' => $search]);
    }

    public function create()
    {
        //
    }

    public function agregarCargo(Request $request)
    {
        //
        $cargo = Cargo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion ?? ' ',
            'estado' => 'activo',
            'usuario_id' => 1,
        ]);
        return back()->with('listo', 'se ha insertado correctamente');
    }

    public function editarEstadoCargo(Request $request, $id)
    {
        $cargo = Cargo::findOrFail($id);
        // Cambia el estado del cargo
        $cargo->estado = $cargo->estado == 'activo' ? 'inactivo' : 'activo';

        $cargo->save();
        return back()->with('listo', 'se cambio el estado correctamente');
    }
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
    public function editarCargo(Request $request)
    {
        $cargo = Cargo::findOrFail($request->id);
        $validator = validator::make($request->all(), [
            'nombre' => 'required|min:3|max:50',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('listo', 'Favor de llenar todos los campos')
                ->withErrors($validator);
        } else {
            $cargo->nombre = $request->nombre;
            $cargo->descripcion = $request->descripcion ?? ' ';
            $cargo->save();
            return back()->with('listo', 'se ha actualizo correctamente');
        }
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
        return back()->with('listo', 'se elimino correctamente');
    }
}
