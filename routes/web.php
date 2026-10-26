<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;


Route::get('/', function () {
    return view('inicio');
});

// Route::get('/ola', function () {
//     return 'Olá mundo';
// });

// Route::get('/ola/{nome}', function (string $nome) {
//     return "Olá, " . e($nome);
// });

// Route::get('/ola/{nome}/{curso}', function (string $nome, string $curso) {
//     return e($nome) . " está no curso de " . e($curso);
// });

// Route::get('/saudacao/{nome?}', function (?string $nome = null) { 
//     return 'Bem-vindo, ' . e($nome ?? 'visitante') . '!'; 
// });

// Route::get('/dobro/{numero}', function (int $numero) {
//     return 'O dobro de ' . e($numero) . ' é ' . e($numero * 2);
// })->whereNumber('numero');

// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('/test2', function () {
//     return view('test2');
// });

// Route::get('/perfil', function () {
//     return view('perfil', [
//         'nome' => 'Mário Amorim',
//         'ano' => 2,
//         'curso' => 'DWDM',
//         'interesses' => ['Laravel', 'MySQL', 'PHP']
//     ]);
// });

// Route::get('/eventos', function () use ($eventos) {
//     return view('eventos.index', [
//         'eventos' => $eventos,
//     ]);
// });

Route::get('/eventos', [EventoController::class, 'index'])
    ->name('eventos.index');

Route::get('/eventos/proximos', [EventoController::class, 'proximos'] )
    ->name('eventos.proximos');

Route::get('/eventos/{id}', [EventoController::class, 'show'])
    ->whereNumber('id')
    ->name('eventos.show');
