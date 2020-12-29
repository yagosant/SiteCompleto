<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    // Ao crirar uma migração na mão lembrar de referenciar no model o nome da tabela, USAR SOMENTE CASO SEJA PERSONALIZADO
    protected $table = "imoveis";

    //definindo as relações
    public function tipo()
    {
        return $this->belongsTo('App\Tipo','tipo_id');
    }

    
    public function cidade()
    {
        return $this->belongsTo('App\Cidades','cidade_id');
    }

    public function galeria()
    {
        //retorno 1 para n
        return $this->hasmany('App\Galeria','imovel_id');
    }
}
