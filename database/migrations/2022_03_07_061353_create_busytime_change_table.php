<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusytimeChangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('busy_time', function (Blueprint $table) {
            $table->integer('repeat_time', false, true)->nullable()->after('repeats');
            $table->enum('repeat_time_option', ['week', 'month', 'year'])->after('repeat_time')->default(null)->nullable();
            $table->date('ending')->nullable()->after('repeat_time_option')->comment('Optional');
        });

        Schema::table('appointment', function (Blueprint $table) {
            $table->integer('repeat_time', false, true)->nullable()->after('repeats');
            $table->enum('repeat_time_option', ['week', 'month', 'year'])->after('repeat_time')->default(null)->nullable();
            $table->date('ending')->nullable()->after('repeat_time_option')->comment('Optional');
        });
    }

}