<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(UsuariosSeeds::class);
         $this->call(PaginasSeeds::class);
         $this->call(PapelSeeds::class);
         $this->call(PermissaoSeeds::class);
    }
}
