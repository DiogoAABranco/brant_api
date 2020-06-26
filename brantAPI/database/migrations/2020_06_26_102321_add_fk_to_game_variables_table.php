<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToGameVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_variables', function (Blueprint $table) {
            //
            $table->dropForeign(['session_id']);
            $table->dropColumn(['session_id']);
            $table->foreignId('training_program_id')->nullable()->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_variables', function (Blueprint $table) {
            //
            $table->dropForeign(['training_program_id']);
            $table->dropColumn(['training_program_id']);
            $table->foreignId('session_id')->constrained()->onDelete('cascade');
        });
    }
}
