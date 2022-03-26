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
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->date('invoicedate')->nullable()->comment('Invoice Generated Date');
            $table->decimal('totalprice', 10, 2)->nullable()->comment('Sale total price');
            $table->enum('paidtype', ['CreditCard', 'Cash', 'Voucher'])->default(null)->nullable()->comment('');
            $table->enum('status', ['Pending', 'Paid', 'Failed'])->default(null)->nullable();
            $table->timestamps();
        });

        Schema::table('sale', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Salon');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['1', '2', '3', '4', '5', '6'])->default(null)->nullable()->comment('1-Only Appointment, 2-Appointment With Service, 3-Appointment With Service And Product, 4-Only Services, 5-Only Products, 6-Service and Products');
            $table->decimal('cost', 10, 2)->nullable()->comment('depend on type, Booked Appointment or Service or Product sale cost');
            $table->integer('qty', false, true)->nullable()->comment('only product use');
            $table->timestamps();
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id')->after('id')->nullable()->comment('Type Of Sale');
            $table->foreign('sale_id')->references('id')->on('sale')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('appointment_id')->after('sale_id')->nullable()->comment('Type Of Appointment');
            $table->foreign('appointment_id')->references('id')->on('appointment')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('appointment_id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('service_id')->nullable()->comment('Type Of Service');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->after('staff_id')->nullable()->comment('Type Of Product');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale');
    }
};