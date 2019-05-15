<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos_servicos', function (Blueprint $table) {
            $table->integer('atendimentos_id')->unsigned();
            $table->foreign('atendimentos_id')->references('id')->on('atendimentos');
            $table->integer('servicos_id')->unsigned();
            $table->foreign('servicos_id')->references('id')->on('servicos');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('atendimentos__servicos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
