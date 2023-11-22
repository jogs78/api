<?php

namespace Database\Seeders;

use App\Models\Chofer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ChoferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuevo = new Chofer();
        $nuevo->save();
        $nuevo = new Chofer();
        $nuevo->save();
    }
}
