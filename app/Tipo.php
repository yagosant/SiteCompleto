<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
     //fazendo as relações com os imoveis    
     public function imoveis()
     {
         return $this->hasmany('App\Imovel','tipo_id');
     }
}
