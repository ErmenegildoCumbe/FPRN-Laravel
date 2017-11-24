<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['assunto','valorpossivel','observacao','estado','remetente','receptor'];
    
     protected $with = ['remetente'];

    public function remetente(){
   		return $this->belongsTo('App\User', 'remetente');
   	}
}
