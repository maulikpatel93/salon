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
        Schema::table('voucher_to', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->after('id')->nullable()->comment('Type Of Cart');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('voucher_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('voucher_type', ['Voucher', 'OneOffVoucher'])->after('email')->default(null)->nullable();
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_to_id')->after('voucher_id')->nullable()->comment('Type Of Voucher to ');
            $table->foreign('voucher_to_id')->references('id')->on('voucher_to')->onUpdate('cascade')->onDelete('cascade');
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
