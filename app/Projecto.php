<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $fillable = ['tituloProjecto','objectivo','publicoAlvo','duracaoProjecto','custoProjecto','anexo','areaactuacaos_id'];
}
