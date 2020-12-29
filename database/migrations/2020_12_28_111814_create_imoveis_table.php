<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();//apenas valores positivos
            $table->foreign('tipo_id')->references('id')->on('tipos'); //referencia ao id da tabela tipos, chave estrangeira
            $table->integer('cidade_id')->unsigned();//apenas valores positivos
            $table->foreign('cidade_id')->references('id')->on('cidades'); //referencia ao id da tabela tipos, chave estrangeira
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->enum('status',['vende','aluga']);
            $table->string('endereco');
            $table->string('cep');
            $table->decimal('valor',6,2);// 6 digitos, duas casas depois da virgula
            $table->integer('dormitorios');
            $table->string('detalhes');
            $table->text('mapa')->nullable();// pode ser nulo
            $table->bigInteger('visualizacoes')->default(0); //numero de visualizações do imovel
            $table->enum('publica', ['sim','nao'])->default('nao'); //valida se o anuncio será publicado


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
        Schema::dropIfExists('imoveis');
    }
}
