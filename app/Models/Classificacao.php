<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Confronto;

class Classificacao extends Model
{
    protected $table = 'classificacao';

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

    public function getTimeCasa($time_casa_id)
    {
        return Classificacao::where('time_id', $time_casa_id)->first();
    }

    public function getTimeVisitante($time_visitante_id)
    {
        return Classificacao::where('time_id', $time_visitante_id)->first();
    }

    public function time()
    {
        return $this->hasOne(Time::class, 'id');
    }
}
