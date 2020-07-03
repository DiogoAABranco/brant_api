<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\GameVariableType;
use App\ProfileByDomains;

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
        ProfileByDomains::truncate();
        DB::table('domain_profile_by_domains')->truncate();
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

        $profileByDomains = new ProfileByDomains;
        $profileByDomains->save();

        $profileByDomains->domains()->attach([1,6,8]);


        $profileByDomains2 = new ProfileByDomains;
        $profileByDomains2->save();
        $profileByDomains2->domains()->attach([7,2,9,8]);

        $profileByDomains3 = new ProfileByDomains;
        $profileByDomains3->save();
        $profileByDomains3->domains()->attach([1,4,6,11]);

        $profileByDomains4 = new ProfileByDomains;
        $profileByDomains4->save();
        $profileByDomains4->domains()->attach([9]);

        $profileByDomains5 = new ProfileByDomains;
        $profileByDomains5->save();
        $profileByDomains5->domains()->attach([3,6]);

        $profileByDomains6 = new ProfileByDomains;
        $profileByDomains6->save();
        $profileByDomains6->domains()->attach([4]);




        $vars = GameVariableType::all();
        $game = Game::create([
            'name' => 'jogo 1',
            'description' => 'descrição do jogo 1',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => $profileByDomains->id
        ]);
        $game->gameVariableType()->attach($vars);

        $game2 = Game::create([
            'name' => 'jogo 2',
            'description' => 'descrição do jogo 2',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => 2
        ]);
        $game2->gameVariableType()->attach([2,3]);

        $game3 = Game::create([
            'name' => 'jogo 3',
            'description' => 'descrição do jogo 3',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => 3
        ]);
        $game3->gameVariableType()->attach([1,3]);

        $game4 = Game::create([
            'name' => 'jogo 4',
            'description' => 'descrição do jogo 4',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => 4
        ]);
        $game4->gameVariableType()->attach([1,2,3]);

        $game5 = Game::create([
            'name' => 'jogo 5',
            'description' => 'descrição do jogo 5',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => 5
        ]);
        $game5->gameVariableType()->attach([1,3]);

        $game6 = Game::create([
            'name' => 'jogo 6',
            'description' => 'descrição do jogo 6',
            'image' => 'urlDaImagem',
            'profile_by_domains_id' => 6
        ]);
        $game6->gameVariableType()->attach([2,3]);





    }
}
