<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicos_id')->unsigned();
            $table->foreign('servicos_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->float('comissao', 8,2);
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
        Schema::dropIfExists('comissoes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
