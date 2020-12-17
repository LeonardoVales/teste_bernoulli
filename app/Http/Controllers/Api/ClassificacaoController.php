<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Classificacao;

class ClassificacaoController extends Controller
{

    protected $classificacao;

    public function __construct()
    {
        $this->classificacao = new Classificacao;
    }

    public function index()
    {    
        $listaClassificacao = Classificacao::get();
        
        $classificacao = [];

        foreach ($listaClassificacao as $list) {

            $classificacao[] = [
                'id'                  => $list->id,
                'time_id'             => $list->time_id,
                'time'                => $list->time,
                'pontos'              => $list->pontos,
                'quantidade_jogos'    => $list->quantidade_jogos,
                'quantidade_vitorias' => $list->quantidade_vitorias,
                'quantidade_empates'  => $list->quantidade_empates,
                'gols_pro'            => $list->gols_pro,
                'gols_contra'         => $list->gols_contra,
                'saldo_gols'          => $list->saldo_gols,
            ];            
        }
        
        return response()->json($listaClassificacao);
    }
}
