<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMembersSociodemographicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members_sociodemographic_data', function (Blueprint $table) {


            $table->unsignedBigInteger('fm_id')->unsigned();
            $table->unsignedBigInteger('sd_id')->unsigned();

            $table->foreign('fm_id')->references('id')->on('family_members');
            $table->foreign('sd_id')->references('id')->on('sociodemographic_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_members_sociodemographic_data');
    }
}
