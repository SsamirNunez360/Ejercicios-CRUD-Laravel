<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::where('usuario', 'admin')->first() ?? new User();

        $usuario->name = 'Administrador';
        $usuario->usuario = 'admin';
        $usuario->password = Hash::make('12345678');
        $usuario->save();
    }
}