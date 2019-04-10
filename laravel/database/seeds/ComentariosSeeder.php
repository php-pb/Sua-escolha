<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Comentario;
use App\Postagem;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $postagens = Postagem::all()->pluck('id')->toArray();
        foreach(range(1,10000) as $index) {
            $comentario = new Comentario();
            $comentario->nome = $faker->name;
            $comentario->descricao = $faker->paragraph;
            $comentario->postagem_id = $faker->randomElement($postagens);
            $comentario->save();
        }
    }
}
