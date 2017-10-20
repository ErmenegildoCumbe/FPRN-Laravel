<?php

namespace App\Http\Controllers;

use App\Pedidoemprestimo;
use App\Combatente;
use App\Areaactuacao;
use Illuminate\Http\Request;

class PedidoemprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidoemprestimo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "ola";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedidoemprestimo  $pedidoemprestimo
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidoemprestimo $pedidoemprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedidoemprestimo  $pedidoemprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidoemprestimo $pedidoemprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedidoemprestimo  $pedidoemprestimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidoemprestimo $pedidoemprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedidoemprestimo  $pedidoemprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidoemprestimo $pedidoemprestimo)
    {
        //
    }

    public function createattr($id){
        $combatente = Combatente::findOrFail($id);
        $areaactuacao = Areaactuacao::all();
        if (isset($combatente)) {
             return view('pedidoemprestimo.create',compact('combatente','areaactuacao'));
        }
        else{
            return view('home');
        }
    }

    public function ola()
    {
        return 'ola';
    }
}
