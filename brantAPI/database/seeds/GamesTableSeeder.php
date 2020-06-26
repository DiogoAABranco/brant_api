<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\GameVariableType;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Game::truncate();
        GameVariableType::truncate();
        DB::table('game_game_variable_type')->truncate();

        GameVariableType::create([
            'name' => 'parametro 1'
        ]);
        GameVariableType::create([
            'name' => 'parametro 2'
        ]);
        GameVariableType::create([
            'name' => 'parametro 3'
        ]);


        $vars = GameVariableType::all();
        $game = Game::create([
            'name' => 'jogo 1',
            'description' => 'descrição do jogo 1',
            'image' => 'urlDaImagem',
        ]);
        $game->gameVariableType()->attach($vars);

        $game2 = Game::create([
            'name' => 'jogo 2',
            'description' => 'descrição do jogo 2',
            'image' => 'urlDaImagem',
        ]);
        $game2->gameVariableType()->attach([2,3]);

        $game3 = Game::create([
            'name' => 'jogo 3',
            'description' => 'descrição do jogo 3',
            'image' => 'urlDaImagem',
        ]);
        $game3->gameVariableType()->attach([1,3]);

        $game4 = Game::create([
            'name' => 'jogo 4',
            'description' => 'descrição do jogo 4',
            'image' => 'urlDaImagem',
        ]);
        $game4->gameVariableType()->attach([1,2,3]);

        $game5 = Game::create([
            'name' => 'jogo 5',
            'description' => 'descrição do jogo 5',
            'image' => 'urlDaImagem',
        ]);
        $game5->gameVariableType()->attach([1,3]);

        $game6 = Game::create([
            'name' => 'jogo 6',
            'description' => 'descrição do jogo 6',
            'image' => 'urlDaImagem',
        ]);
        $game6->gameVariableType()->attach([2,3]);

    }
}
