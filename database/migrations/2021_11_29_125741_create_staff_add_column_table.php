<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAddColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
        Schema::table('staff', function (Blueprint $table) {
            $table->unsignedBigInteger('price_tier_id')->after('salon_id')->nullable()->comment('Type Of Price tier');
            $table->foreign('price_tier_id')->references('id')->on('price_tier')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
}
