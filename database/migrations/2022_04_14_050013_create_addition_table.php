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
        Schema::table('sale', function (Blueprint $table) {
            $table->decimal('voucher_discount', 10, 2)->nullable()->comment('voucher discount of total price');
            $table->decimal('total_pay', 10, 2)->nullable()->comment('total pay = totalprice-voucher price');
        });

        Schema::table('sale', function (Blueprint $table) {
            $table->unsignedBigInteger('applied_voucher_to_id')->after('appointment_id')->nullable()->comment('Type Of Applied Voucher to id');
            $table->foreign('applied_voucher_to_id')->references('id')->on('voucher_to')->onUpdate('cascade')->onDelete('cascade');
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
