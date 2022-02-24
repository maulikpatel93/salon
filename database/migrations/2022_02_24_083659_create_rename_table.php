<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->time("start_time")->change()->nullable();
            $table->time("end_time")->change()->nullable();
        });
        Schema::table('staff_working_hours', function (Blueprint $table) {
            $table->time("start_time")->change()->nullable();
            $table->time("end_time")->change()->nullable();
        });
        Schema::table('roster', function (Blueprint $table) {
            $table->time("start_time")->change()->nullable();
            $table->time("end_time")->change()->nullable();
        });
        Schema::table('busy_time', function (Blueprint $table) {
            $table->time("start_time")->change()->nullable();
            $table->time("end_time")->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rename');
    }
}