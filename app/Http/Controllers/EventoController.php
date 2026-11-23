<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\View\View;
// use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        

        $tipo = $request->query('tipo');
        $disponibilidade = $request->query('disponibilidade');

        $eventos = Evento::query()
            ->when($tipo, fn($consulta) => $consulta->where('tipo', $tipo))
            ->when($disponibilidade === 'Esgotados', 
                fn($consulta) => $consulta->whereColumn('inscritos', '>=', 'vagas'))
            ->when($disponibilidade === 'Disponíveis', 
                fn($consulta) => $consulta->whereColumn('inscritos', '<', 'vagas'))
            ->orderBy('data')
            ->get();
    
    
        // $eventos = config('eventos');
        // $tipo = request('tipo');
        // $disponibilidade = request('disponibilidade');

        // if ($tipo) {
        //     $eventos = array_filter($eventos,
        //         fn ($evento) => $evento['tipo'] === $tipo
        //     );
        // }

        // if ($disponibilidade === 'Esgotados') {
        //     $eventos = array_filter(
        //         $eventos,
        //         fn ($evento) => $evento['inscritos'] >= $evento['vagas']
        //     );
        // } elseif ($disponibilidade === 'Disponíveis') {
        //     $eventos = array_filter(
        //         $eventos,
        //         fn ($evento) => $evento['inscritos'] < $evento['vagas']
        //     );
        // }

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
            'disponibilidade' => $disponibilidade,
        ]);
    }

    public function proximos(): view
    {
        // $eventos = config('eventos');
        // $hoje = date('Y-m-d');

        // $eventos = array_filter(
        //     $eventos,
        //     fn ($evento) => $evento['data'] >= $hoje
        // );

        // usort(
        //     $eventos,
        //     fn ($a, $b) => $a['data'] <=> $b['data']
        // );

        $eventos= Evento::query()
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->get();

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => null,
            'disponibilidade' => null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento): View
    {
        // $evento = Evento::find($id);

        // if ($evento === null) {
        //     abort(404);
        // }

        return view('eventos.show', [
            'evento' => $evento,
        ]);
    }

    // private function procurar(int $id): ?array
    // {
    //     foreach (config('eventos') as $evento) {
    //         if ($evento['id'] === $id) {
    //             return $evento;
    //         } 
    //     }

    //     return null;
    // }

    public function porTipo (string $tipo): view
    {
        // // Obtém os eventos definidos em config/eventos.php
        // $eventos = config("eventos");
        
        // // Reúne os tipos existentes para validar o parâmetro recebido na URL
        // $tipos = array_column($eventos, "tipo");

        // // Se o tipo não exixtir, apresentar um 404
        // if (! in_array($tipo, $tipos, true)) {
        //     abort(404);
        // }

        $eventos = Evento::query()
            ->where('tipo', $tipo)
            ->orderBy('data')
            ->get();

        // Se não houver ecentos deste, o tipo nao existe: 404
        if ($eventos->isEmpty()) {
            abort(404);
        }

        // Mostra apenas os eventos do tipo pedido
        return view ('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
            'disponibilidade' => null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
