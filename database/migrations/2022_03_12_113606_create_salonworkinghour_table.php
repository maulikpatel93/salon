<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonworkinghourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_working_hours', function (Blueprint $table) {
            $table->id();
            $table->string('days', 50);
            $table->string('start_time', 50)->nullable();
            $table->string('end_time', 50)->nullable();
            $table->text('break_time')->nullable();
            $table->enum('dayoff', ['0', '1'])->default('1')->nullable()->comment('1-dayon and 0-dayoff');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('salon_working_hours', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('salons', function (Blueprint $table) {
            $table->string('approx_number_of_staff', 50)->nullable();
            $table->dropColumn('owner_name');
        });
    }
}