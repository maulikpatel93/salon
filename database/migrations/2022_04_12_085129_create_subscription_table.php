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
            $table->enum('repeat_time_option', ['Monthly', 'Yearly'])->default(null)->nullable();
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
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