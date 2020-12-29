<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     //relacao com papels de muitos para muitos n para n
     public function papeis(){

        return $this->belongsToMany(Papel::class);
    }
    //adiciona o cargo ao user
    public function adicionaPapel($papel)
    {
        //verifica se é uma string
        if(is_string($papel)){
            return $this->papeis()->save(
                //busca o papel
                Papel::where('nome','=',$papel)->firstOrFail() //caso n encontre ele falha e n continua e n salva 
            );
        }else{
            return $this->papeis()->save(
                Papel::where('nome','=',$papel->nome)->firstOrFail()
            );
        }
    }

    //remove o cargo ao user
    public function removePapel($papel)
    {
        if(is_string($papel)){
            return $this->papeis()->detach(
                    Papel::where('nome','=',$papel)->firstOrFail() //caso n funcione a função ele cancela e para
                );
        }
        return $this->papeis()->detach(
                Papel::where('nome','=',$papel->nome)->firstOrFail()
            );
    }

    public function existePapel($papel)
    {
        if(is_string($papel)){
            return $this->papeis->contains('nome',$papel);
        }

        return $papel->intersect($this->papeis)->count();
    }

    public function existeAdmin()
    {
        return $this->existePapel('admin');
    }
}
