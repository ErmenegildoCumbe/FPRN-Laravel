<?php

namespace App\Http\Controllers;

use App\Pedidoemprestimo;
use App\Combatente;
use App\Areaactuacao;
use Illuminate\Http\Request;
use Auth;
use PDF;


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
      // $pedidoemprestimo->rendimento = $request->rendimento;
       $pedidoemprestimo->tempoProposto = $request->tempoProposto;
       $pedidoemprestimo->observacao = $request->observacao;
       $pedidoemprestimo->pedidoestado = 1;
      
       $pedidoemprestimo->combatentes_id = $request->combatenteId;
       $pedidoemprestimo->linhacreditos_id = $request->linhacreditoId;
       $project = $request->projectoId;
       if($project==0){
            $pedidoemprestimo->projectos_id = null;
       }
       else{
            $pedidoemprestimo->projectos_id = $project;
       }
       
       $pedidoemprestimo->users_id = Auth::id();
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
        $pedidos = Pedidoemprestimo::orderBy('created_at', 'DESC')->get();
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

    public function viajson(Request $request){
        $id = $request->dat;
         $pedidoemprestimo = Pedidoemprestimo::where('combatentes_id','=',$id)->get();
        // return $combatentes->toJson();
         // $outro;
         // @foreach ($combatentes as $key ) {
         //     $outro = $outro+$key;
         // }
        //$outro = $combatentes[1]->provincia->provincia;
         return Response($pedidoemprestimo);
         //return view('combatentes.index');
        //return Response($outro);
    }

    public function paraaprovacao(){
        $listaPedidos = Pedidoemprestimo::all();
        return view('admin.pedidosemprestimos', compact('listaPedidos'));
    }

    public function dom(){
        

    $pdf = PDF::loadView('teste');
    return $pdf->download('primeiroviaDom.pdf');
    }

    // public function avaliar(){
    //     $pedido = Pedidoemprestimo::all();
    //     return view('admin.avaliacao',compact('pedido'));
    // }

    public function avaliar2($id){
        $pedido = Pedidoemprestimo::findOrFail($id);
        return view('admin.avaliacao',compact('pedido'));
    }

    public function estatisticas(){
        //$pedido = Pedidoemprestimo::findOrFail($id);
        return view('admin.reporters');
    }

    
}
