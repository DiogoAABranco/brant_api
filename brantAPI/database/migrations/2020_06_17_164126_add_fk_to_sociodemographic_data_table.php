<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToSociodemographicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sociodemographic_data', function (Blueprint $table) {
            //
            $table->foreignId('education_level_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sociodemographic_data', function (Blueprint $table) {
            //
            $table->dropForeign(['education_level_id']);
        });
    }
}
