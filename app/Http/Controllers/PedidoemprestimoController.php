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
       // try{
        $data = date('Y-m-d');
       $pedidoemprestimo = new Pedidoemprestimo;
       $pedidoemprestimo->montante = $request->montante;
       $pedidoemprestimo->data = $data;
       $pedidoemprestimo->rendimento = $request->rendimento;
       $pedidoemprestimo->tempoProposto = $request->tempoProposto;
       $pedidoemprestimo->observacao = $request->observacao;
       $pedidoemprestimo->pedidoestado = 1;
       $pedidoemprestimo->combatentes_id = $request->combatenteId;
       $pedidoemprestimo->linhacreditos_id = $request->linhacreditoId;
       $pedidoemprestimo->projectos_id = $request->projectoId;
       $pedidoemprestimo->users_id = 1;
       $pedidoemprestimo->save();

   //}catch(\Exception $e){
    // return back()->withInput();
  // }
       //$mensagem = "Pedido submetido comsucesso!"; //,compact('pedidoemprestimo')
       //return view('pedidoemprestimo.imprimirComprovativo');
        //return redirect()->route('pedidoemprestimo.imprimirComprovativo', compact('pedidoemprestimo'));
        //return $mensagem;
       // $var = "ola";
        //return Response($pedidoemprestimo);
        return $pedidoemprestimo->id;
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

    public function gravar(Request $request){
         //return view('pedidoemprestimo.imprimirComprovativo');
        view('pedidoemprestimo.imprimirComprovativo')->render();
        //$mensagem = "Agora sim";
      //  return $mensagem;
    }

    public function paraimprimir($id){

         //return view('home');
        $pedidoemprestimo = Pedidoemprestimo::findOrFail($id);
        return view('pedidoemprestimo.imprimirComprovativo',compact('pedidoemprestimo'));
    }

    public function getall(){
        $pedidos = Pedidoemprestimo::all();
        //echo  $pedidos;
         return view('pedidoemprestimo.lista', compact('pedidos'));
        //return echo "Dadd";
       // return view('pedidoemprestimo.index');
       //return  redirect()->route('combatente');

    }
    public function detalhes(Request $request){
         $id = $request->dat;
         $pedidoemprestimo = Pedidoemprestimo::findOrFail($id);
        return Response($pedidoemprestimo);
        //return 1;
    }
    
}
