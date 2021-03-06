<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use App\Pedidoemprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
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
        $emprestimo = new Emprestimo;
        $data = date('Y-m-d');
        $emprestimo->dataAprovacao = $data;
        $emprestimo->montanteDisponibilizado= $request->valor;
        $emprestimo->tempoPagamento= $request->tempo;
        $emprestimo->tempoPagamentoInicial= 3;
        $emprestimo->pedidoemprestimos_id= $request->senha;
        $emprestimo->valorMensal= $request->valormensal;
        $emprestimo->emprestimoestado= 1;
        $emprestimo->save();
        $pedido = Pedidoemprestimo::findOrFail($request->senha);
        $pedido->pedidoestado = 2;
        $pedido->save();
        $sucesso="Sucesso";
        return $sucesso;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
