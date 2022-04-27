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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('amount', 10, 2)->nullable()->comment('Subscription amount');
            $table->enum('repeats', ['Yes', 'No'])->default('No')->nullable(); // 1:Active, 0:Inactive
            $table->integer('repeat_time', false, true)->nullable()->comment('Month');
            $table->enum('repeat_time_option', ['Weekly', 'Monthly', 'Yearly'])->default(null)->nullable();
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('subscription', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('subscription_services', function (Blueprint $table) {
            $table->id();
            $table->integer('qty', false, true)->nullable()->comment('only service qty');
            $table->timestamps();
        });

        Schema::table('subscription_services', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('subscription_id')->after('salon_id')->nullable()->comment('Type Of Subscription');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('subscription_id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('sale', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->dropColumn('paidby');
        });
        Schema::table('price_tier', function (Blueprint $table) {
            $table->boolean('is_default')->default(0);
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_id')->after('membership_id')->nullable()->comment('Type Of Subscription');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Membership', 'Subscription'])->default(null)->nullable();
            $table->decimal('price', 10, 2)->nullable()->comment('total price of Membership and Subscription');
            $table->string('credit', 200)->nullable()->comment('use only type membership');
            $table->string('used_membership_credit', 200)->nullable()->comment('use only type membership');
            $table->string('balance', 200)->nullable()->comment('use only type membership and Voucher');
            $table->timestamps();
        });

        Schema::table('plan', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('membership_id')->after('client_id')->nullable()->comment('Type Of membership');
            $table->foreign('membership_id')->references('id')->on('membership')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('subscription_id')->after('membership_id')->nullable()->comment('Type Of Subscription');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
};