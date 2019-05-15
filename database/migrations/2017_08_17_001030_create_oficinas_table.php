<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->string('cnpj', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('tel1', 20)->nullable();
            $table->string('tel2', 20)->nullable();
            $table->string('tel3', 20)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 200)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 200)->nullable();
            $table->string('bairro', 200)->nullable();
            $table->string('pontoreferencia', 200)->nullable();
            $table->string('lat', 55)->nullable();
            $table->string('long', 55)->nullable();
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
        Schema::dropIfExists('oficinas');
    }
}