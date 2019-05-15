<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas_servicos', function (Blueprint $table) {
            $table->integer('servicos_id')->unsigned();
            $table->foreign('servicos_id')->references('id')->on('servicos');
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
        Schema::dropIfExists('oficinas_servicos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
