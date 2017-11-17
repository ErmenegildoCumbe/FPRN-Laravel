<?php

namespace App\Http\Controllers;

use App\Projecto;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProjectoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $projecto = new Projecto;
       $projecto->tituloProjecto = $request->tituloProjecto;
       $projecto->objectivo = $request->objectivo;
       $projecto->publicoAlvo = $request->publicoAlvo;
       $projecto->duracaoProjecto = $request->duracaoProjecto;
       $projecto->custoProjecto = $request->custoProjecto;
       // $projecto->anexo = $request->file('userfile')->getClientOriginalName();
       if ($request->hasFile('userfile')) {
          $projecto->anexo = $request->userfile->store('public/docs');

          }
       //  //$projecto->anexo = $request->userfile->extension();
       // $request->file('userfile')->move( base_path . 'public/docs', $userfile->getClientOriginalName());
       $projecto->areaactuacaos_id = $request->AreaActuacaoId;
       $projecto->save();

       return $projecto->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projecto  $projecto
     * @return \Illuminate\Http\Response
     */
    public function show(Projecto $projecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projecto  $projecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Projecto $projecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projecto  $projecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projecto $projecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projecto  $projecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projecto $projecto)
    {
        //
    }
}
