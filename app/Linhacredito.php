<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linhacredito extends Model
{
	protected $fillable = ['designacao','valorMinimo','valorMaximo'];

     // public function pedidoemprestimo(){
   		// return $this->hasMany('App\Pedidoemprestimo');
   		// }

   	public function pedidoemprestimo(){
   		return $this->hasMany('App\Pedidoemprestimo','linhacreditos_id');
   		}
}
