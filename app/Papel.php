<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    //fillable permite criar registro de forma mais rapida, porem é preciso informar os campos que podem ser criados em massa
    protected $fillable =[
        'nome',
        'descricao'
    ];

    //relacao com papels de muitos para muitos n para n
    public function permissoes(){

        return $this->belongsToMany(Permissao::class);
    }
     
     public function adicionarPermissao($permissao){

        return $this->permissoes()->save($permissao);
    }

    
    public function removerPermissao($permissao){

        return $this->permissoes()->detach($permissao);
    }
     
}
