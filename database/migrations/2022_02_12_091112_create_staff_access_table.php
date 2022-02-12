<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_permissions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Staff', 'Client', 'Common'])->default(null)->nullable();
            $table->string('module', 200);
            $table->string('title', 100);
            $table->string('name', 100);
        });

        Schema::create('salon_access', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Staff', 'Client'])->default(null)->nullable();
            $table->enum('access', ['0', '1'])->default('0')->nullable();
        });

        Schema::table('salon_access', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('salon_permission_id')->after('salon_id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_permission_id')->references('id')->on('salon_permissions')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('salon_permission_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_access');
    }
}