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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('payment_mode', ['Live', 'Test'])->default(null)->nullable();
            $table->string('stripe_account_id', 255)->nullable()->comment('stripe salon account setup id ');
            $table->string('stripe_customer_account_id', 255)->nullable()->comment('stripe salon customer(client) account setup id ');
        });

        // Schema::create('payment', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Membership', 'Subscription', 'Voucher'])->default(null)->nullable();
            $table->enum('paidby', ['StripeCreditCard', 'CreditCard', 'Cash', 'Voucher'])->default(null)->nullable()->comment('');
            $table->decimal('amount', 10, 2)->nullable()->comment('');
            $table->date('payment_date', 10, 2)->nullable()->comment('');
            $table->enum('status', ['Pending', 'Paid', 'Failed'])->default(null)->nullable();
            $table->string('transaction_id', 255)->default(null)->nullable();
            $table->timestamps();
        });
        Schema::table('payment', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id')->after('id')->nullable()->comment('Type Of Sale');
            $table->foreign('sale_id')->references('id')->on('sale')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};