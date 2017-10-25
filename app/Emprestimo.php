<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = ['montanteDisponibilizado','dataAprovacao','tempoPagamento','tempoPagamentoInicial','emprestimoestado','valorMensal','pedidoemprestimos_id'];
}
