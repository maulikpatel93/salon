<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSlaonAddColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('role_id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('price_tier_id')->after('salon_id')->nullable()->comment('Type Of Price tier');
            $table->foreign('price_tier_id')->references('id')->on('price_tier')->onUpdate('cascade')->onDelete('cascade');
        });
        //Add Client && staff Information
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->comment('Client Role'); // 1:Active, 0:Inactive
            $table->date('date_of_birth')->nullable()->comment('Client Role');
            $table->text('address')->nullable()->comment('Client Role');
            $table->string('street', 255)->nullable()->comment('Client Role');
            $table->string('suburb', 255)->nullable()->comment('Client Role');
            $table->string('state', 100)->nullable()->comment('Client Role');
            $table->string('postcode', 10)->nullable()->comment('Client Role');
            $table->text('description')->nullable()->comment('Client Role');
            $table->boolean('send_sms_notification')->default(0)->nullable()->comment('Client Role: Send sms notification to client'); // 1:Active, 0:Inactive
            $table->boolean('send_email_notification')->default(0)->nullable()->comment('Client Role: Send email notification to client'); // 1:Active, 0:Inactive
            $table->boolean('recieve_marketing_email')->default(0)->nullable()->comment('Client Role: Client agrees to receive marketing emails'); // 1:Active, 0:Inactive
            $table->boolean('calendar_booking')->default(0)->nullable()->comment('Staff Role'); // 1:Active, 0:Inactive
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}