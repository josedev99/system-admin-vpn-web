<?php

use App\rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rol::create([
            'name' => 'administrador',
            'description' => 'Acceso completo al sistema'
        ]);
    }
}
