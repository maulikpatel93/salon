<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddOnServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_on_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('add_on_services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->after('id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('add_on_service_id')->after('service_id')->nullable()->comment('Type Of Add on Service');
            $table->foreign('add_on_service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_on_services');
    }
}
