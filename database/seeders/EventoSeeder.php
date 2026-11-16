<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("eventos")->insert([
            'titulo' => 'Hackaton ISLA 24h',
            'tipo' => 'Hackaton',
            'data' => '2026-11-25',
            'local' => 'Auditório Principal',
            'descricao' => 'Evento de hackaton com duração de 24 horas.',
            'vagas' => 60,
            'inscritos' => 41,
        ]);
    }
}
