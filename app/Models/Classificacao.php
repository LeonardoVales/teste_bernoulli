<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Confronto;
use PhpParser\Builder\Class_;

class Classificacao extends Model
{
    protected $table = 'classificacao';

    /**
     * Método que atualiza a tabela de classificação
     *
     * @param Confronto $confronto
     */
    public function atualizaClassificacao(Confronto $confronto)
    {
        $time_casa      = $this->getTimeCasa($confronto->time_casa_id);
        $time_visitante = $this->getTimeVisitante($confronto->time_visitante_id);
        

        if ($time_casa && $time_visitante) {

            //Houve empate
            if ($confronto->qtd_gols_time_casa == $confronto->qtd_gols_time_visitante) {

                $time_casa->pontos      += 1;
                $time_visitante->pontos += 1;

                $time_casa->quantidade_empates      += 1;
                $time_visitante->quantidade_empates += 1;

            }

            //Time da casa venceu
            if ($confronto->qtd_gols_time_casa > $confronto->qtd_gols_time_visitante) {
                $time_casa->pontos              += 3;
                $time_casa->quantidade_vitorias += 1;

                $time_visitante->quantidade_derrotas += 1;
            }

            //Time visitante venceu
            if ($confronto->qtd_gols_time_visitante > $confronto->qtd_gols_time_casa) {
                $time_visitante->pontos              += 3;
                $time_visitante->quantidade_vitorias += 1;

                $time_casa->quantidade_derrotas += 1;
            }

            //Atualiza a quantidade de jogos 
            $time_casa->quantidade_jogos       += 1;
            $time_visitante->quantidade_jogos  += 1;

            //Atualiza a quantidade de gols pro
            //Desconsidera os gols contrários.
            $time_casa->gols_pro      += $confronto->qtd_gols_time_casa - $confronto->qdt_gols_contra_time_visitante;
            $time_visitante->gols_pro += $confronto->qtd_gols_time_visitante - $confronto->qtd_gols_contra_time_casa;

            //Atualiza o saldo de gols
            $time_casa->saldo_gols      = $time_casa->saldo_gols + $confronto->qtd_gols_time_casa - $confronto->qtd_gols_time_visitante;            
            $time_visitante->saldo_gols = $time_visitante->saldo_gols + $confronto->qtd_gols_time_visitante - $confronto->qtd_gols_time_casa;

            //Atualiza cartões amarelo
            $time_casa->qtd_cartoes_amarelo       += $confronto->cartoes_amarelo_time_casa;
            $time_visitante->qtd_cartoes_amarelo += $confronto->cartoes_amarelo_time_visitante;

            //Atualiza cartões vermelho
            $time_casa->qtd_cartoes_vermelho      += $confronto->cartoes_vermelho_time_casa;
            $time_visitante->qtd_cartoes_vermelho += $confronto->cartoes_vermelho_time_visitante;

            $time_casa->save();
            $time_visitante->save();
            
        }

    
    }

    /**
     * Lista a tabela de classificação
     *     
     */
    public function getListaClassificacao()
    {
        
        // $listaClassificacao = Classificacao::get();
        $listaClassificacao = Classificacao::orderBy('quantidade_vitorias', 'desc')
                                            ->orderBy('saldo_gols', 'desc')
                                            ->orderBy('gols_pro', 'desc')
                                            ->orderBy('qtd_cartoes_vermelho', 'asc')
                                            ->orderBy('qtd_cartoes_amarelo', 'asc')
                                            ->get();
            
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
                'quantidade_derrotas' => $list->quantidade_derrotas,
                'gols_pro'            => $list->gols_pro,
                'gols_contra'         => $list->gols_contra,
                'saldo_gols'          => $list->saldo_gols,
            ];            
        }

        return $classificacao;
    }

    /**
     * Pega o time da casa na tabela de classificação
     */
    public function getTimeCasa($time_casa_id)
    {
        return Classificacao::where('time_id', $time_casa_id)->first();
    }

    /**
     * Peta o time visitante na tabela de classificação
     */
    public function getTimeVisitante($time_visitante_id)
    {
        return Classificacao::where('time_id', $time_visitante_id)->first();
    }

    /**
     * Relacionamento com a tabela de times
     */
    public function time()
    {
        return $this->hasOne(Time::class, 'id');
    }
}
