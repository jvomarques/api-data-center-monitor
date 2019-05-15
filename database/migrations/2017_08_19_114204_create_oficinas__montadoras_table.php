<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasMontadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas_montadoras', function (Blueprint $table) {
            $table->integer('montadoras_id')->unsigned();
            $table->foreign('montadoras_id')->references('id')->on('montadoras');
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
        Schema::dropIfExists('oficinas_montadoras');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
