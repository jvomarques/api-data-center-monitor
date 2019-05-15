<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dataabertura');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('restrict');
            $table->integer('veiculos_id')->unsigned();
            $table->foreign('veiculos_id')->references('id')->on('veiculos')->onDelete('restrict');
            $table->integer('oficinas_id')->unsigned();
            $table->foreign('oficinas_id')->references('id')->on('oficinas')->onDelete('restrict');
            $table->dateTime('dataagendamento');
            $table->string('tempoprevisto');
            $table->dateTime('datafechamento');
            $table->decimal('valor', 5, 2);
            $table->integer('avaliacoes_id')->unsigned();
            $table->foreign('avaliacoes_id')->references('id')->on('avaliacoes')->onDelete('restrict');
            $table->string('logradouro', 250)->nullable();
            $table->string('complemento', 250)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('numero', 50)->nullable();
            $table->string('cidade', 150)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('uf', 2)->nullable();
            $table->integer('situacoes_id')->unsigned();
            $table->foreign('situacoes_id')->references('id')->on('situacoes')->onDelete('restrict');
            $table->longText('observacoes')->nullable();
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
        Schema::dropIfExists('atendimentos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
