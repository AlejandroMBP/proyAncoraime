<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'girasol',
            'username' => 'girasol',
            'email' => 'johndoe@example.com',
            'imagen' => ' ',
            'estado' => 'activo',
            'password' => Hash::make('girasol123'),
        ])->assignRole('Administrador');
    }
}
