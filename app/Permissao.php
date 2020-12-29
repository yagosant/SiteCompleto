<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    //fillable permite criar registro de forma mais rapida, porem é preciso informar os campos que podem ser criados em massa
    protected $fillable =[
        'nome',
        'descricao'
    ];

    //relacao com papels de muitos para muitos n para n
    public function papeis(){

        return $this->belongsToMany(Papel::class);
    }
}
