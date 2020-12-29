<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    //fazendo as relações com os imoveis    
    public function imoveis()
    {
        return $this->hasmany('App\Imovel','cidade_id');
    }
}
