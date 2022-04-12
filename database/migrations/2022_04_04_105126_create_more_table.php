<?php

use Illuminate\Database\Migrations\Migration;
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
        // Schema::create('sale_discount', function (Blueprint $table) {
        //     $table->id();
        //     $table->enum('discount_type', ['Voucher'])->default(null)->nullable();
        //     $table->string('code', 16)->comment('Voucher Code');
        //     $table->decimal('amount', 10, 2)->nullable();
        //     $table->timestamps();
        // });

        // Schema::table('sale_discount', function (Blueprint $table) {
        //     $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
        //     $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

        //     $table->unsignedBigInteger('sale_id')->after('salon_id')->nullable()->comment('Type Of Sale');
        //     $table->foreign('sale_id')->references('id')->on('sale')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('more');
    }
};