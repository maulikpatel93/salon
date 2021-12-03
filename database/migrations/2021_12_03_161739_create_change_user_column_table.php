<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeUserColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('staff_working_hours', function (Blueprint $table) {
            $table->dropForeign('staff_working_hours_staff_id_foreign');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->change();
        });

        Schema::table('roster', function (Blueprint $table) {
            $table->dropForeign('roster_staff_id_foreign');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->change();
        });

        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('appointment_staff_id_foreign');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->change();
        });

        Schema::table('busy_time', function (Blueprint $table) {
            $table->dropForeign('busy_time_staff_id_foreign');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}