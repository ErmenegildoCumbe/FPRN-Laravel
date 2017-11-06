<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
	protected $fillable = ['provincia'];
	
   public function combatentes(){
   		return $this->hasMany('App\Combatente', 'provincias_id');
   	}

   
}
