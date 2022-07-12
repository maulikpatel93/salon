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
        Schema::create('nofify_detail', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable()->comment('stripe salon account setup id ');
            $table->enum('nofify', ['Email', 'SMS'])->default(null)->nullable();
            $table->enum('type', ['NewAppointment', 'AppointmentReminder', 'CancelledAppointment', 'NoShow', 'ReplyYesToConfirm'])->default(null)->nullable();
            $table->text('short_description')->nullable()->comment('short description');
            $table->text('appointment_times_description')->nullable()->comment('appointmnet times description');
            $table->text('cancellation_description')->nullable()->comment('appointmnet cancellation description');
            $table->longText('preview')->nullable()->comment('preview Template html code only');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('nofify_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->after('salon_id')->nullable()->comment('Type Of User');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('notification', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('salon_id')->nullable()->comment('Type Of User');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addition');
    }
};
