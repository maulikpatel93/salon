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
            $table->date('eventdate')->nullable()->comment('calendar event date');
            $table->dateTime('invoicedate')->nullable()->comment('sale Invoice date');
            $table->decimal('totalprice', 10, 2)->nullable()->comment('Sale total price');
            $table->enum('status', ['Pending', 'Paid', 'Failed', 'Cancel'])->default(null)->nullable();
            $table->timestamps();
        });

        Schema::table('sale', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('appointment_id')->after('client_id')->nullable()->comment('Type Of Appointment');
            $table->foreign('appointment_id')->references('id')->on('appointment')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Appointment', 'Service', 'Product', 'Voucher', 'Membership', 'Subscription', 'OneOffVoucher'])->default(null)->nullable();
            $table->decimal('cost', 10, 2)->nullable()->comment('depend on type, Booked Appointment or Service or Product sale cost');
            $table->integer('qty', false, true)->nullable()->comment('only product use');
            $table->timestamps();
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id')->after('id')->nullable()->comment('Type Of Sale');
            $table->foreign('sale_id')->references('id')->on('sale')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('sale_id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('service_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->after('staff_id')->nullable()->comment('Type Of Product');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('voucher_id')->after('product_id')->nullable()->comment('Type Of Voucher');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('membership_id')->after('voucher_id')->nullable()->comment('Type Of membership');
            $table->foreign('membership_id')->references('id')->on('membership')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('voucher_to', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100)->nullable();
            $table->string('code', 16);
            $table->boolean('is_send')->default(0)->comment('only use email send with pdf attachment');
            $table->decimal('amount', 10, 2)->nullable()->comment('Voucher and oneoffvoucher amount');
            $table->text('message')->nullable();
            $table->timestamps();
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
