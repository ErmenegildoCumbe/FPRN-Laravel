<?php

namespace App\Http\Controllers;

use App\Combatente;
use App\Provincia;
use Illuminate\Http\Request;

class CombatenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combatentes = Combatente::all();

       return view('combatentes.index', compact('combatentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Provincia::all();
        return view('combatentes.create',compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $combatente = new Combatente;
        $combatente->nome = $request->nome;
        $combatente->apelido = $request->apelido;
        $combatente->telefone = $request->telefone;
        $combatente->sexo = $request->sexo;
        $combatente->tipoMutuario = $request->tipoMutuario;
        $combatente->numeroCombatente = $request->numeroCombatente;
        $combatente->provincias_id = $request->provincia;
        
        $combatente->save();
        return redirect()->route('combatente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Combatente  $combatente
     * @return \Illuminate\Http\Response
     */
    public function show(Combatente $combatente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Combatente  $combatente
     * @return \Illuminate\Http\Response
     */
    public function edit(Combatente $combatente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Combatente  $combatente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combatente $combatente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Combatente  $combatente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combatente $combatente)
    {
        //
    }
}
