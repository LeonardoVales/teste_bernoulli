<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGolsContraTimeVisitanteTableConfrontos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confrontos', function (Blueprint $table) {
            $table->integer('qdt_gols_contra_time_visitante')->after('qtd_gols_time_visitante')->comment('quantidade de gols contra que o time da casa fez na partida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confrontos', function (Blueprint $table) {
            $table->dropColumn('qdt_gols_contra_time_visitante');
        });
    }
}
