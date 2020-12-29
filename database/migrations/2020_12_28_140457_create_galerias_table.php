<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imovel_id')->unsigned();
            $table->foreign('imovel_id')->references('id')->on('imoveis');
            $table->string('titulo')->nullable();//titulo do texto
            $table->string('descricao')->nullable();//descrcao do texto
            $table->string('imagem');//url imagem
            $table->string('ordem')->nullable();//ordem das imagens

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
        Schema::dropIfExists('galerias');
    }
}
