<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //preparo la base de datos para introducir nuevo rol, y en caso de que haya algo creado no se modifique
        DB::statement("SET foreign_key_checks=0");



        Administrador::truncate();
        User::truncate();
        DB::statement('SET foreign_key_checks=1');
        //creo un superusuario si hay alguno creado lo borra y crea el nuevo para no duplicar
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'apellidos' => $data['apellidos'],
                    'DNI' => $data['DNI'],
                    'telefono' => $data['telefono'],
                    'rol'=>['administrador']
        ]);
        $admin = Administrador::create([
        ]);
    }

}
