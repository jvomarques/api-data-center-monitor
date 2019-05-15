<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos_oficinas', function (Blueprint $table) { 
            $table->integer('atendimentos_id')->unsigned();
            $table->foreign('atendimentos_id')->references('id')->on('atendimentos');
            $table->integer('oficinas_id')->unsigned();
            $table->foreign('oficinas_id')->references('id')->on('oficinas');
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
        Schema::dropIfExists('atendimentos_oficinas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
