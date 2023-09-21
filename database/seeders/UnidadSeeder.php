<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*
        $table->string("tipo");
        $table->string("placas");
        $table->foreignId("ruta_id")->constrained();
*/

        $unidad = new Unidad();
        $unidad->tipo="Combi 9101";
        $unidad->placas="AAA";
        $unidad->ruta_id=1;
        $unidad->save();

        $unidad = new Unidad();
        $unidad->tipo="Combi 9102";
        $unidad->placas="AAB";
        $unidad->ruta_id=1;
        $unidad->save();

        $unidad = new Unidad();
        $unidad->tipo="Combi 4201";
        $unidad->placas="BAA";
        $unidad->ruta_id=2;
        $unidad->save();

        $unidad = new Unidad();
        $unidad->tipo="Combi 4202";
        $unidad->placas="BAB";
        $unidad->ruta_id=2;
        $unidad->save();


    }
}
