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
            'name' => 'MoCA',
            'description' => 'Avaliar a condição cognitiva do utente.'
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


        /*
            IAFAI
        */

        AssessmentTool::create([
            'name' => 'IAFAI',
            'description' => 'Avaliação da capacidade funcional de adultos e idosos.'
        ]);

        Module::create([
            'name' => 'Atividades básicas de vida diária (ABVD)',
            'assessment_tool_id' => 2
        ]);

        Submodule::create([
            'name' => 'Incapacidade funcional - ABVD',
            'type' => 'numeric',
            'min_value' => 0,
            'max_value' => 100,
            'module_id' => 2
        ]);


        Module::create([
            'name' => 'Atividades instrumentais de vida diária - Familiares (AIVD-F)',
            'assessment_tool_id' => 2
        ]);

        Submodule::create([
            'name' => 'Incapacidade funcional - AIVD-F',
            'type' => 'numeric',
            'min_value' => 0,
            'max_value' => 100,
            'module_id' => 3
        ]);


        Module::create([
            'name' => 'Atividades instrumentais de vida diária - Avançadas (AIVD-A)',
            'assessment_tool_id' => 2
        ]);

        Submodule::create([
            'name' => 'Incapacidade funcional - AIVD-A',
            'type' => 'numeric',
            'min_value' => 0,
            'max_value' => 100,
            'module_id' => 4
        ]);


        Module::create([
            'name' => 'Global',
            'assessment_tool_id' => 2
        ]);

        Submodule::create([
            'name' => 'Incapacidade funcional - Total',
            'type' => 'numeric',
            'module_id' => 5
        ]);




    }
}
