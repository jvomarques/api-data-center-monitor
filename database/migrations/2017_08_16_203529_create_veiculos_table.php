<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade');
            $table->integer('modelos_id')->unsigned();
            $table->foreign('modelos_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->integer('cores_id')->unsigned();
            $table->foreign('cores_id')->references('id')->on('cores')->onDelete('cascade');
            $table->string('ano', 4)->nullable();
            $table->bigInteger('km')->nullable();
            $table->string('placa', 8)->nullable();
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
        Schema::dropIfExists('veiculos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
