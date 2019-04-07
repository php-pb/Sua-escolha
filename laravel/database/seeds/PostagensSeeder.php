<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postagem;

class PostagensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,1000) as $index) {
            $postagem = new Postagem();
            $postagem->nome = $faker->title;
            $postagem->descricao = $faker->realText(500);
            $postagem->user_id = 1;
            $postagem->save();
        }
    }
}
