<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_tier', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('price_tier', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->enum('email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 20);
            $table->enum('phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('photo', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('street', 255)->nullable();
            $table->string('suburb', 255)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->enum('calendar_booking', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('staff_working_hours', function (Blueprint $table) {
            $table->id();
            $table->string('days', 50);
            $table->string('start_time', 50)->nullable();
            $table->string('end_time', 50)->nullable();
            $table->text('break_time');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('staff_working_hours', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('salon_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('staff_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('staff_services', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->after('id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('staff_id')->nullable()->comment('Type Of Category');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('roster', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('start_time', 50)->nullable();
            $table->string('end_time', 50)->nullable();
            $table->enum('away', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('roster', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('salon_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // Schema::create('clients', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('first_name', 100);
        //     $table->string('last_name', 100);
        //     $table->string('email', 100)->unique();
        //     $table->enum('email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->string('phone_number', 20);
        //     $table->enum('phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
        //     $table->timestamp('phone_number_verified_at')->nullable();
        //     $table->string('telephone', 20)->nullable();
        //     $table->string('photo', 100)->nullable();
        //     $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(); // 1:Active, 0:Inactive
        //     $table->date('date_of_birth')->nullable();
        //     $table->text('address')->nullable();
        //     $table->string('street', 255)->nullable();
        //     $table->string('suburb', 255)->nullable();
        //     $table->string('state', 100)->nullable();
        //     $table->string('postcode', 10)->nullable();
        //     $table->text('description')->nullable();
        //     $table->enum('send_sms_notification', ['0', '1'])->default(1)->comment('Send sms notification to client'); // 1:Active, 0:Inactive
        //     $table->enum('send_email_notification', ['0', '1'])->default(1)->comment('Send email notification to client'); // 1:Active, 0:Inactive
        //     $table->enum('recieve_marketing_email', ['0', '1'])->default(0)->comment('Client agrees to receive marketing emails'); // 1:Active, 0:Inactive
        //     $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
        //     $table->dateTime('is_active_at')->nullable();
        //     $table->timestamps();
        // });

        // Schema::table('clients', function (Blueprint $table) {
        //     $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
        //     $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}