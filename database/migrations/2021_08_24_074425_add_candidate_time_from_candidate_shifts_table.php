<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCandidateTimeFromCandidateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_shifts', function (Blueprint $table) {
            //
            $table->time('begin_time');
            $table->time('end_time');
            $table->time('rest_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_shifts', function (Blueprint $table) {
            //
        });
    }
}
