<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensagem;

class MensagemController extends Controller
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
       
        $mensagem = new Mensagem;
        $mensagem->assunto = $request->assunto;
        $mensagem->observacao = $request->observacao;
        $mensagem->valorpossivel = $request->valorpossivel;
        $mensagem->remetente = Auth::id();
        $mensagem->estado = 1;
        //$user = User::where('email','=',$request->email)->first();
        //$mensagem->receptor = $user->id;
        // $menbro = Membro::where('grupos_id','=',$request->meusgrupos)
        // ->where('users_id','=',$userid)
        // ->first();
        // $mensagem->membros_id = $menbro->id;
        $mensagem->save();
         //$su="sucesso";
        
        return response()->json($mensagem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function leitura($id)
    {
       
    }
}
