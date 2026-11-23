<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// use Illuminate\Support\Facades\DB; 
use App\Models\Evento;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $proximos = config('eventos');
        // $hoje = date('Y-m-d');

        // $proximos = array_filter(
        //     $proximos,
        //     fn ($evento) => $evento['data'] >= $hoje
        // );

        // usort(
        //     $proximos,
        //     fn ($a, $b) => strcmp($a['data'], $b['data'])
        // );

        $proximos = Evento::query()
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', [
            'proximos' => $proximos,
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
    public function show(string $id)
    {
        //
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
