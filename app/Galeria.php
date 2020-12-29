<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    //listar os imoveis pertencentes a galeria
    public function imovel()
    {
        return $this->belongsTo('App\Imovel','imovel_id');
    }
}
