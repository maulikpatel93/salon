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
            $table->string('payment_intent', 255)->nullable()->comment('Only Stripe Payment Use');
            $table->string('payment_intent_client_secret', 400)->nullable()->comment('Only Stripe Payment Use');
            $table->string('redirect_status', 255)->nullable()->comment('Only Stripe Payment Use');
            $table->string('invoice', 255)->nullable()->comment('Only Stripe Payment Invoice Id');
            $table->timestamps();
        });
        Schema::table('payment', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sale_id')->after('salon_id')->nullable()->comment('Type Of Sale');
            $table->foreign('sale_id')->references('id')->on('sale')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('sale_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('subscription_id')->after('client_id')->nullable()->comment('Type Of subscription');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('salons', function (Blueprint $table) {
            $table->string('business_website', 500)->nullable();
        });

        Schema::create('closeddate', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable()->comment('sale Invoice date');
            $table->date('end_date')->nullable()->comment('sale Invoice date');
            $table->text('reason')->nullable();
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('closeddate', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('voucher_to', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->after('id')->nullable()->comment('Type Of Cart');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('voucher_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('voucher_type', ['Voucher', 'OneOffVoucher'])->after('email')->default(null)->nullable();
            $table->decimal('remaining_balance', 10, 2)->nullable()->comment('');
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
        Schema::dropIfExists('payment');
    }
};
