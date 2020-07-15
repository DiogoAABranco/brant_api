<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSubmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submodules', function (Blueprint $table) {
            //
            $table->integer('max_value')->nullable();
            $table->integer('min_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submodules', function (Blueprint $table) {
            //
            $table->dropColumn(['max_value']);
            $table->dropColumn(['min_value']);

        });
    }
}
