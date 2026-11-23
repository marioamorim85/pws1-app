<?php

namespace Database\Seeders;


use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = Tipo::pluck('id', 'slug');
        Evento::create([
            'titulo' => 'Hacklaton ISLA 24h',
            'tipo_id' => $tipos['hackathon'],
            'data' => '2026-11-25',
            'local' => 'Auditório Principal',
            'descricao' => 'Evento de hackaton com duração de 24 horas.',
            'vagas' => 60,
            'inscritos' => 41,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Evento::create([
            'titulo' => 'Workshop de Laravel',
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-10-14',
            'local' => 'Laboratório 2.05',
            'descricao' => 'Workshop de Laravel para iniciantes.',
            'vagas' => 20,
            'inscritos' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Evento::create([
            'titulo' => 'Palestra: Carreiras em Cibersegurança',
            'tipo_id' => $tipos['palestra'],
            'data' => '2026-10-21',
            'local' => 'Auditório',
            'descricao'=> 'Workshop sobre carreiras em cibersegurança.',
            'vagas' => 120,
            'inscritos' => 120,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Evento::create([
            'titulo' => 'Git e GitHub para iniciantes',
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-09-30',
            'local' => 'Laboratório 1.02',
            'descricao' => 'Workshop sobre Git e GitHub para iniciantes.',
            'vagas' => 25,
            'inscritos' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Evento::create([
            'titulo' => 'Conversa com antigos alunos DWDM',
            'tipo_id' => $tipos['palestra'],
            'data' => '2026-12-02',
            'local' => 'Sala 3.10',
            'descricao'=> 'Conversa com antigos alunos do curso de DWDM.',
            'vagas' => 40,
            'inscritos' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Evento::create([
            'titulo' => 'Workshop de desenvolvimento web',
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-12-10',
            'local' => 'Laboratório 2.01',
            'descricao'=> 'Workshop de desenvolvimento web.',
            'vagas' => 30,
            'inscritos' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
