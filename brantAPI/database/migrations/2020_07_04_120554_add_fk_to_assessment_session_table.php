<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAssessmentSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_sessions', function (Blueprint $table) {
            //
            $table->foreignId('assessment_tool_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessment_sessions', function (Blueprint $table) {
            //
            $table->dropForeign(['assessment_tool_id']);
            $table->dropColumn(['assessment_tool_id']);
        });
    }
}
