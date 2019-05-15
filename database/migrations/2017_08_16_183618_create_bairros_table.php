<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBairrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bairros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cidades_id')->unsigned();
            $table->foreign('cidades_id')->references('id')->on('cidades')->onDelete('cascade');
            $table->string('nome');
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
        Schema::dropIfExists('bairros');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
