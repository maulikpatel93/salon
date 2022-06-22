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
            $table->enum('status', ['Pending', 'Paid', 'Failed', 'Cancel'])->default(null)->nullable();
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

        Schema::table('sale', function (Blueprint $table) {
            $table->decimal('voucher_discount', 10, 2)->nullable()->comment('voucher discount of total price');
            $table->decimal('total_pay', 10, 2)->nullable()->comment('total pay = totalprice-voucher price');
        });

        Schema::table('sale', function (Blueprint $table) {
            $table->unsignedBigInteger('applied_voucher_to_id')->after('appointment_id')->nullable()->comment('Type Of Applied Voucher to id');
            $table->foreign('applied_voucher_to_id')->references('id')->on('voucher_to')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('salon_settings', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100)->nullable()->comment('Type off setting example Client Notification, salon Notification, appointment notification');
            $table->string('title', 200)->nullable();
            $table->text('value')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_value')->default(1)->comment('Only Use Of switches in active/inactive'); // 1:Active, 0:Inactive
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
        });

        Schema::table('salon_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cancellation_reason', function (Blueprint $table) {
            $table->id();
            $table->text('reason')->nullable();
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('cancellation_reason', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('voucher_to', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('consultation', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable()->comment('Use Only title example heading title');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('consultation', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('consultation_form', function (Blueprint $table) {
            $table->id();
            $table->enum('section_type', ['ClientDetail', 'FormSection'])->default(null)->nullable();
            $table->string('label', 255)->nullable()->comment('ClientDetail(First Name, Last Name, Email, Mobile, Address, Birthday) FormSection(Heading, Text Block, Dropdwon, Multiple Choice, Short Answer, Long Answer, Yes or No, CheckBox)');
            $table->text('labeltext')->nullable()->comment('label text example Heading: Title 1 of the Most');
            $table->string('form_type', 255)->nullable()->comment('text,select,multiselect,checkbox,date,radio,textarea');
            $table->integer('position', false, true)->nullable()->comment('position');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('consultation_form', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_id')->after('salon_id')->nullable()->comment('Type Of Consultation');
            $table->foreign('consultation_id')->references('id')->on('consultation')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('consultation_form_answer', function (Blueprint $table) {
            $table->id();
            $table->text('answer')->nullable()->comment('answer of consultation_form');
            $table->timestamps();
        });

        Schema::table('consultation_form_answer', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_id')->after('salon_id')->nullable()->comment('Type Of Consultation');
            $table->foreign('consultation_id')->references('id')->on('consultation')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_form_id')->after('consultation_id')->nullable()->comment('Type Of Consultation form');
            $table->foreign('consultation_form_id')->references('id')->on('consultation_form')->onUpdate('cascade')->onDelete('cascade');
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
