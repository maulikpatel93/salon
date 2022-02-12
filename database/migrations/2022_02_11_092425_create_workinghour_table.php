<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkinghourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff_working_hours', function (Blueprint $table) {
            $table->enum('dayoff', ['0', '1'])->default('1')->nullable()->comment('1-dayon and 0-dayoff');
        });
    }
}