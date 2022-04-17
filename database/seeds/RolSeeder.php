<?php

use App\rol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('rols')->truncate();
        rol::create([
            'name' => 'administrador',
            'description' => 'Acceso completo al sistema'
        ]);
        rol::create([
            'name' => 'Usuario',
            'description' => 'Acceso limitado al sistema'
        ]);
        rol::create([
            'name' => 'Operador',
            'description' => 'Acceso limitado al sistema'
        ]);
    }
}
