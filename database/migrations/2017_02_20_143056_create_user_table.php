<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nome', 200);
            $table->string('email', 200)->unique();
            $table->string('senha');
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('logradouro', 250)->nullable();
            $table->string('complemento', 250)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('numero', 50)->nullable();
            $table->string('cidade', 150)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('telefone1', 15)->nullable();
            $table->string('telefone2', 15)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}