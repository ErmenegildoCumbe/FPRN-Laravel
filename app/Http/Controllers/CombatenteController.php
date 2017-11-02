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

    public function viajson(){
         $combatentes = Combatente::all();
        // return $combatentes->toJson();
         // $outro;
         // @foreach ($combatentes as $key ) {
         //     $outro = $outro+$key;
         // }
        //$outro = $combatentes[1]->provincia->provincia;
         return Response($combatentes);
         //return view('combatentes.index');
        //return Response($outro);
    }
    public function autocomplete(Request $request){
        $combatentes = Combatente::where('nome','LIKE','%'.$request->term.'%')
        ->take(5)
        ->get();
        $results = array();
        foreach ($combatentes as $key => $value) {
            $results[] = ['id'=>$value->id,'value'=>$value->nome,'numecom'=>$value->numeroCombatente,'apelido'=>$value->apelido,'contacto'=>$value->telefone,'genero'=>$value->sexo,'provincia'=>$value->provincia->provincia];
        }
        return Response($results);

    }
}
