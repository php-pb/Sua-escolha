<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Administrador',
            'email'    => 'admin@email.com',
            'password' => bcrypt('admin'),
            'perfil'   => 'admin'
        ]);
        DB::table('users')->insert([
            'name'     => 'Usuário',
            'email'    => 'user@email.com',
            'password' => bcrypt('user'),
            'perfil'   => 'user'
        ]);
    }
}
