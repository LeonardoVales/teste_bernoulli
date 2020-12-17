<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confronto extends Model
{
    protected $table = 'confrontos';

    protected $fillable = [
        'time_casa_id',
        'qtd_gols_time_casa',
        'qdt_gols_contra_time_casa',
        'cartoes_amarelo_time_casa',
        'cartoes_vermelho_time_casa' ,

        'time_visitante_id',
        'qtd_gols_time_visitante',
        'qdt_gols_contra_time_visitante',
        'cartoes_amarelo_time_visitante',
        'cartoes_vermelho_time_visitante',
    ];
}
