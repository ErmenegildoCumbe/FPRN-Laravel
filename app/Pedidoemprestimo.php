<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Combatente;
use App\Linhacredito;

class Pedidoemprestimo extends Model
{
	 protected $fillable = ['montante','data','rendimento','tempoProposto','observacao','pedidoestado','combatentes_id','linhacreditos_id','projectos_id','users_id'];
	 protected $with = ['combatente','linhacredito'];

    public function combatente(){
    	return $this->belongsTo('App\Combatente','combatentes_id');
    }

    public function linhacredito(){
    	return $this->belongsTo('App\Linhacredito','linhacreditos_id');
    }
}
