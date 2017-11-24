<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','apelido','telefone','nivelAcesso','nomeUtilizador','foto'
    ];
   // protected $with = ['combatente'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function pedidos(){
        return $this->hasMany('App\Pedidoemprestimo', 'users_id');
    }
    public function combatente(){
        return $this->hasOne('App\Combatente','users_id');
        }

    public function mensagem(){
        return $this->hasMany('App\Mensagem', 'remetente');
    }
}
