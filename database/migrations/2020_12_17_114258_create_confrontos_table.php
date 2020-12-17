<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfrontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confrontos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time_casa_id');
            $table->integer('qtd_gols_time_casa')->comment('quantidade de gols do time da casa');
            $table->integer('cartoes_amarelo_time_casa')->comment('quantidade de cartões amarelo que o time da casa sofreu na partida');
            $table->integer('cartoes_vermelho_time_casa')->comment('quantidade de cartões vermelho que o time da casa sofreu na partida');

            $table->unsignedBigInteger('time_visitante_id');
            $table->integer('qtd_gols_time_visitante')->comment('quantidade de gols do time visitante');
            $table->integer('cartoes_amarelo_time_visitante')->comment('quantidade de cartões amarelo que o time visitante sofreu na partida');
            $table->integer('cartoes_vermelho_time_visitante')->comment('quantidade de cartões vermelho que o time visitante sofreu na partida');

            $table->foreign('time_casa_id')->references('id')->on('times');
            $table->foreign('time_visitante_id')->references('id')->on('times');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confrontos');
    }
}
