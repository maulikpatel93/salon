<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusyTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busy_time', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('start_time', 50)->nullable();
            $table->string('end_time', 50)->nullable();
            $table->enum('repeats', ['Yes', 'No'])->default('No')->nullable(); // 1:Active, 0:Inactive
            $table->text('reason')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('busy_time', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('salon_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('start_time', 50)->nullable();
            $table->string('end_time', 50)->nullable();
            $table->string('duration', 50)->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->enum('repeats', ['Yes', 'No'])->default('No'); // 1:Active, 0:Inactive
            $table->text('booking_notes')->nullable();
            $table->enum('status', ['Scheduled', 'Confirmed', 'Completed', 'Cancelled'])->default(null)->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->enum('reschedule', ['0', '1'])->default('0');
            $table->dateTime('reschedule_at')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('appointment', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('client_id')->nullable()->comment('Type Of Client');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('service_id')->nullable()->comment('Type Of Staff');
            $table->foreign('staff_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busy_time');
    }
}
