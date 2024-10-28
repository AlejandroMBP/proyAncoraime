<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        $role = Role::all();
        return view('Administrador.usuarios.index', compact('user', 'role'));
    }
    public function store(Request $request)
    {
        // dump($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/',
                'regex:/^\S*$/',
                'unique:users,username'
            ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'rol' => 'required|exists:roles,name',
        ], [
            'username.min' => 'El nombre de usuario debe tener al menos 8 caracteres.',
            'username.regex' => 'Debe tener 1 mayúscula (A), 1 especial (@) y sin espacios.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'email.unique' => 'El Email ya está en uso.',
        ]);

        $user = User::create([
            'name' => $request->nombre,
            'username' => $request->username,
            'imagen' => 'no disponible',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado' => 1,
        ]);
        // $user->save();
        $user->assignRole($request->rol);
        return response()->json(['message' => 'Usuario creado exitosamente.'], 201);
    }

    public function show(string $id)
    {
        //
    }
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        // Obtener el rol asignado
        $rol = $usuario->getRoleNames()->first(); // Devuelve el primer rol del usuario

        return response()->json([
            'usuario' => $usuario,
            'rol' => $rol,
        ]);
    }
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/',
                'regex:/^\S*$/',
                'unique:users,username,' . $id, // Ignorar el usuario actual
            ],
            'email' => 'required|email|unique:users,email,' . $id, // Ignorar el usuario actual
            'rol' => 'required|exists:roles,name',
        ], [
            'username.min' => 'El nombre de usuario debe tener al menos 8 caracteres.',
            'username.regex' => 'El nombre de usuario debe contener al menos una letra mayúscula, un carácter especial y no debe tener espacios.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'email.unique' => 'El correo electrónico ya está en uso.',
        ]);
        // Obtener el usuario y actualizar sus datos
        // $usuario = User::findOrFail($id);
        // $usuario->name = $request->name;
        // $usuario->username = $request->username;
        // $usuario->email = $request->email;

        // // Actualizar el rol del usuario
        // $usuario->save();
        // $usuario->syncRoles([$request->rol]); // Asigna el nuevo rol
        return response()->json(['message' => 'Usuario actualizado con éxito.']);
    }
    public function destroy(string $id)
    {
        //
    }
}
