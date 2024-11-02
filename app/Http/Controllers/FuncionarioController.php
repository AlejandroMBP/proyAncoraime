<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Cargo;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cargos = Cargo::orderBy('nombre', 'ASC')
            ->get();
        $query = $request->get('search');

        if ($request->ajax()) {
            $funcionarios = Funcionario::where('estado', '!=', 'eliminado')
                ->when($query, function ($queryBuilder) use ($query) {
                    return $queryBuilder->where('nombre', 'like', '%' . $query . '%')
                        ->orWhere('paterno', 'like', '%' . $query . '%')
                        ->orWhere('materno', 'like', '%' . $query . '%')
                        ->orWhere('ci', 'like', '%' . $query . '%');
                })
                ->orderBy('id', 'DESC')
                ->paginate(10);

            return view('Administrador.funcionarios.table', compact('funcionarios', 'cargos'))->render();
        }
        // Para la vista inicial
        $funcionarios = Funcionario::where('estado', '!=', 'eliminado')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('Administrador.funcionarios.listarFu', ['funcionarios' => $funcionarios], ['cargos' => $cargos]);
    }

    public function create()
    {
        //
    }

    public function agregarFuncionario(Request $request)
    {
        //
        $funcionario = Funcionario::create([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'ci' => $request->ci,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'celular' => $request->celular,
            'cargo_id' => $request->cargo_id,
            'unidad' => $request->unidad,
            'estado' => 'activo',
            'descripcion' => $request->descripcion ?? ' ',
            'usuario_id' => 1,
        ]);
        return back()->with('listo', 'se ha insertado correctamente');
    }

    public function editarEstadoFuncionario(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        // Cambia el estado del cargo
        $funcionario->estado = $funcionario->estado == 'activo' ? 'inactivo' : 'activo';

        $funcionario->save();
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
    public function editarFuncionario(Request $request)
    {
        $funcionario = Funcionario::findOrFail($request->id);

        $funcionario->nombre = $request->nombre;
        $funcionario->paterno = $request->paterno;
        $funcionario->materno = $request->materno;
        $funcionario->ci = $request->ci;
        $funcionario->fecha_nacimiento = $request->fecha_nacimiento;
        $funcionario->celular = $request->celular;
        $funcionario->cargo_id = $request->cargo_id;
        $funcionario->unidad = $request->unidad;
        $funcionario->descripcion = $request->descripcion ?? ' ';
        $funcionario->save();
        return back()->with('listo', 'se ha actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarFuncionario($id)
    {
        //
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->estado = 'eliminado';
        $funcionario->save();
        return back()->with('listo', 'se elimino correctamente');
    }
}
