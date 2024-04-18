<?php

namespace Database\Seeders;

use App\Models\Calendario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calendarios = [
            [
                'evento' => 'dia de mi amoricto',
                'fecha_inicio' => '2024-04-14 12:00',
                'fecha_fin' => '2024-04-14 22:00',

            ],

        ];
        foreach ($calendarios as $calendario) {
            Calendario::create($calendario);
        }
    }
}
