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
            'min_value' => 0,
            'max_value' => 6,
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Memória',
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Nomeação',
            'min_value' => 0,
            'max_value' => 3,
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Função executiva',
            'min_value' => 0,
            'max_value' => 5,
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Linguagem',
            'min_value' => 0,
            'max_value' => 3,
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Abstração',
            'min_value' => 0,
            'max_value' => 2,
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Evocação diferida',
            'min_value' => 0,
            'max_value' => 5,
            'type' => 'numeric',
            'module_id' => 1
        ]);

        Submodule::create([
            'name' => 'Orientação',
            'min_value' => 0,
            'max_value' => 6,
            'type' => 'numeric',
            'module_id' => 1
        ]);



    }
}
