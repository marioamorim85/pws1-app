<?php

use Illuminate\Support\Facades\Route;

$eventos = [
    [
        'id' => 1,
        'titulo' => 'Workshop de Laravel',
        'tipo' => 'workshop',
        'data' => '2026-10-14',
        'local' => 'Laboratório 2.05',
        'vagas' => 20,
        'inscritos' => 12,
    ],
    [
        'id' => 2,
        'titulo' => 'Palestra: Carreiras em Cibersegurança',
        'tipo' => 'palestra',
        'data' => '2026-10-21',
        'local' => 'Auditório',
        'vagas' => 120,
        'inscritos' => 120,
    ],
    [
        'id' => 3,
        'titulo' => 'Hackathon ISLA 24h',
        'tipo' => 'hackathon',
        'data' => '2026-11-06',
        'local' => 'Átrio principal',
        'vagas' => 60,
        'inscritos' => 41,
    ],
    [
        'id' => 4,
        'titulo' => 'Git e GitHub para iniciantes',
        'tipo' => 'workshop',
        'data' => '2026-09-30',
        'local' => 'Laboratório 1.02',
        'vagas' => 25,
        'inscritos' => 25,
    ],
    [
        'id' => 5,
        'titulo' => 'Conversa com antigos alunos DWDM',
        'tipo' => 'palestra',
        'data' => '2026-12-02',
        'local' => 'Sala 3.10',
        'vagas' => 40,
        'inscritos' => 9,
    ],
    [
        'id' => 6,
        'titulo' => 'Workshop de desenvolvimento web',
        'tipo' => 'workshop',
        'data' => '2026-12-10',
        'local' => 'Laboratório 2.01',
        'vagas' => 30,
        'inscritos' => 0,
    ],
];

Route::get('/', function () {
    return view('inicio');
});

Route::get('/ola', function () {
    return 'Olá mundo';
});

Route::get('/ola/{nome}', function (string $nome) {
    return "Olá, " . e($nome);
});

Route::get('/ola/{nome}/{curso}', function (string $nome, string $curso) {
    return e($nome) . " está no curso de " . e($curso);
});

Route::get('/saudacao/{nome?}', function (?string $nome = null) { 
    return 'Bem-vindo, ' . e($nome ?? 'visitante') . '!'; 
});

Route::get('/dobro/{numero}', function (int $numero) {
    return 'O dobro de ' . e($numero) . ' é ' . e($numero * 2);
})->whereNumber('numero');

Route::get('/test', function () {
    return view('test');
});

Route::get('/test2', function () {
    return view('test2');
});

Route::get('/perfil', function () {
    return view('perfil', [
        'nome' => 'Mário Amorim',
        'ano' => 2,
        'curso' => 'DWDM',
        'interesses' => ['Laravel', 'MySQL', 'PHP']
    ]);
});

// Route::get('/eventos', function () use ($eventos) {
//     return view('eventos.index', [
//         'eventos' => $eventos,
//     ]);
// });

Route::get('/eventos', function () use ($eventos) {
    $tipo = request('tipo');

    if ($tipo) {
        $eventos = array_filter($eventos,
            fn ($evento) => $evento['tipo'] === $tipo
        );
    }

    return view('eventos.index', [
        'eventos' => $eventos,
        'tipo' => $tipo,
    ]);
});

Route::get('/eventos/{id}', function (int $id) use ($eventos) {
    // Filtrar o evento pelo ID
    $evento = null;

    foreach ($eventos as $item) {
        if ($item['id'] === $id) {
            $evento = $item;
        } 
    }

    if ($evento === null) {
        abort(404);
    }

    return view('eventos.show', [
        'evento' => $evento,
    ]);
})->whereNumber('id');
