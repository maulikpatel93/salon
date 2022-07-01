<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->datetime('start_datetime')->after('end_time')->nullable()->comment('start datetime-UTC');
            $table->datetime('end_datetime')->after('start_datetime')->nullable()->comment('end datetime-UTC');
        });

        Schema::table('busy_time', function (Blueprint $table) {
            $table->datetime('start_datetime')->after('end_time')->nullable()->comment('start datetime-UTC');
            $table->datetime('end_datetime')->after('start_datetime')->nullable()->comment('end datetime-UTC');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addition');
    }
};
