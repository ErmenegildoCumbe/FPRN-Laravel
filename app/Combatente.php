<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combatente extends Model
{
	protected $fillable = ['nome','apelido','telefone','sexo','tipoMutuario','numeroCombatente','provincias_id','users_id']; 

	protected $with = ['provincia','user'];

   public function pedidoemprestimo(){
   		return $this->hasMany('App\Pedidoemprestimo','combatentes_id');
   		}

   	public function provincia(){
   		return $this->belongsTo('App\Provincia', 'provincias_id');
   	}	

   	public function user(){
        return $this->belongsTo('App\Combatente','users_id')->withDefault([
        'name' => 'Nao tem user',
    ]);
        }

}
