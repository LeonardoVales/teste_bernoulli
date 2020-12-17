<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Confronto;
use App\Models\Classificacao;

class ConfrontoController extends Controller
{
    protected $classificacao;

    public function __construct()
    {
        $this->classificacao = new Classificacao;
    }

    public function save(Request $request)
    {
        $confronto = new Confronto;

        try {
            $confronto->time_casa_id               = $request['time_casa_id'];

            //A quantidade de gols do time na partida inclui os gols contrários.
            //Assim fica mais fácil na hora de validar quem venceu a partida.
            //Mas na hora de calcular a quantidade de gols pro na classificação, deve desconsiderar os gols contrários.
            $confronto->qtd_gols_time_casa         = $request['qtd_gols_time_casa'] + $request['qdt_gols_contra_time_visitante'];
            $confronto->qdt_gols_contra_time_casa  = $request['qdt_gols_contra_time_casa'];
            $confronto->cartoes_amarelo_time_casa  = $request['cartoes_amarelo_time_casa'];
            $confronto->cartoes_vermelho_time_casa = $request['cartoes_vermelho_time_casa'];
    
            $confronto->time_visitante_id               = $request['time_visitante_id'];
            $confronto->qtd_gols_time_visitante         = $request['qtd_gols_time_visitante'] + $request['qdt_gols_contra_time_casa'];
            $confronto->qdt_gols_contra_time_visitante  = $request['qdt_gols_contra_time_visitante'];
            $confronto->cartoes_amarelo_time_visitante  = $request['cartoes_amarelo_time_visitante'];
            $confronto->cartoes_vermelho_time_visitante = $request['cartoes_vermelho_time_visitante'];

            $confronto->save();

            $classificacao_atualizada = $this->classificacao->atualizaClassificacao($confronto);

        } catch(\Exception $e) {
            dd($e->getMessage());
        }
    }
}
