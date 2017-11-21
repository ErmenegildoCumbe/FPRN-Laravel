<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areaactuacao extends Model
{
   protected $fillable = ['areaactuacaofundo'];
   
   public function projectos(){
        return $this->hasMany('App\Projecto','areaactuacaos_id');
    }
}
