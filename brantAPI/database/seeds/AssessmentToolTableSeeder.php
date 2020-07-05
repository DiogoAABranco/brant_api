<?php

use Illuminate\Database\Seeder;
use App\AssessmentTool;
use App\Module;
use App\Submodule;

class AssessmentToolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AssessmentTool::truncate();
        Module::truncate();
        Submodule::truncate();

        AssessmentTool::create([
            'name' => 'moca',
            'description' => 'Descrição do teste de avaliação moca...'
        ]);

        Module::create([
            'name' => 'Modulo Moca',
            'assessment_tool_id' => 1
        ]);

        Submodule::create([
            'name' => 'Atenção',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Memória',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Nomeação',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Função executiva',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Linguagem',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Abstração',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Evocação diferida',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Orientação',
            'type' => 'numeric',
            'module_id' => 1
        ]);



    }
}
