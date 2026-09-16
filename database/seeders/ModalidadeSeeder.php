<?php

namespace Database\Seeders;

use App\Models\Modalidade;
use Illuminate\Database\Seeder;

class ModalidadeSeeder extends Seeder
{
    public function run(): void
    {
        Modalidade::create(['nome' => 'Jiu-Jítsu']);
        Modalidade::create(['nome' => 'Judô']);
        Modalidade::create(['nome' => 'Muay Thai']);
        Modalidade::create(['nome' => 'Karatê']);
        Modalidade::create(['nome' => 'Boxe']);
    }
}