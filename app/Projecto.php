<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $fillable = ['tituloProjecto','objectivo','publicoAlvo','duracaoProjecto','custoProjecto','anexo','areaactuacaos_id'];
    protected $with = ['area'];

     public function pedido(){
        return $this->hasOne('App\Pedidoemprestimo','projectos_id');
    }

     public function area(){
    	return $this->belongsTo('App\Areaactuacao','areaactuacaos_id')->withDefault();
    }
}
