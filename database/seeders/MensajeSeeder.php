<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mensaje::truncate();
        Mensaje::create([
            'per_cod'=>'3885821',
            'email'=>'ericksaurio@gmail.com',
            'titulo'=>'Saludos',
            'mensaje'=>'Hola Como Estas',
        ]);
        Mensaje::create([
            'per_cod'=>'4012065',
            'email'=>'josemanuel_cp@gmail.com',
            'titulo'=>'Saludos 2',
            'mensaje'=>'Hola Choco',
        ]);

    }
}
