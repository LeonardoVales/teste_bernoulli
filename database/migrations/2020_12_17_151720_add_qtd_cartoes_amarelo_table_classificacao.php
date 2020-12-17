<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQtdCartoesAmareloTableClassificacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classificacao', function (Blueprint $table) {
            $table->integer('qtd_cartoes_amarelo')->default(0)->after('saldo_gols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classificacao', function (Blueprint $table) {
            $table->dropColumn('qtd_cartoes_amarelo');
        });
    }
}
