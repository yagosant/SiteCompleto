<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();//pode ser nulo
            $table->string('descricao')->nullable();//pode ser nulo
            $table->string('imagem');
            $table->string('link')->nullable();//pode ser nulo
            $table->integer('ordem')->nullable();//pode ser nulo
            $table->enum('publicado',['sim','nao'])->default('nao');

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
        Schema::dropIfExists('slides');
    }
}
