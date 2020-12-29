<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //funcao listar usuarios
     /*    Gate::define('listar-usuarios', function ($user, $permissao)
         {
            return true == $permissao;
    });*/

    //lista todas as permissoes que tem papeis
    foreach($this->getPermissoes() as $permissao){

         Gate::define($permissao->nome,
          function ($user) use($permissao){
              
            return $user->existePapel($permissao->papeis)|| $user->existeAdmin();
    }
);

    }
 } 

    public function getPermissoes()
    {
        //traz todos com relaconamentos com papeis
        return Permissao::with('papeis')->get();
    }
}
