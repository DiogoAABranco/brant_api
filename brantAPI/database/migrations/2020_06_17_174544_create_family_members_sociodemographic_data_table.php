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
        Schema::create('family_member_sociodemographic_data', function (Blueprint $table) {


            $table->unsignedBigInteger('family_member_id')->unsigned();
            $table->unsignedBigInteger('sociodemographic_data_id')->unsigned();

            $table->foreign('family_member_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->foreign('sociodemographic_data_id','sd_data_id')->references('id')->on('sociodemographic_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('family_member_sociodemographic_data', function (Blueprint $table) {
        //     //
        //     $table->dropForeign(['family_members_id']);
        //     $table->dropForeign('sociodemographic_data_id');

        //     $table->dropColumn('family_members_id');
        //     $table->dropColumn('sociodemographic_data_id');
        // });



    }
}
