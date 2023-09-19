<?php

namespace Database\Seeders;
use App\Models\Ruta;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\CommonMark\Extension\DescriptionList\Node\DescriptionTerm;

class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruta = new Ruta();
        $ruta->nombre="91";
        $ruta->origen="Aurrera Terán";
        $ruta->destino="Centarl de abastos";
        $ruta->save();

        $ruta = new Ruta();
        $ruta->nombre="42";
        $ruta->origen="Aurrera Terán";
        $ruta->destino="La misión";
        $ruta->save();

        $ruta = new Ruta();
        $ruta->nombre="Ruta A";
        $ruta->origen="La carreta";
        $ruta->destino="Prepa 5";
        $ruta->save();

    }
}
