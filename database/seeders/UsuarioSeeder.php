<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuevo = new Usuario(['nombre'=>'Chonito','clave' => bcrypt('Chonito'), 'rol'=>'Concesionario', 'token' => 'veP01FvmMPf5Aj8s']);
        $nuevo->save();
        $nuevo = new Usuario(['nombre'=>'Carlos','clave' => bcrypt('Carlos')  , 'rol'=>'Concesionario', 'token' => 'JqDlibZCBATi0W2m' ]);
        $nuevo->save();
        $nuevo = new Usuario(['nombre'=>'Claudia','clave' => bcrypt('Claudia') ]);
        $nuevo->save();

    }
}
