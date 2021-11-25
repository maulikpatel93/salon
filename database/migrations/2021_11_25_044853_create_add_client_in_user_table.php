<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddClientInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->comment('Client Role'); // 1:Active, 0:Inactive
            $table->date('date_of_birth')->nullable()->comment('Client Role');
            $table->text('address')->nullable()->comment('Client Role');
            $table->string('street', 255)->nullable()->comment('Client Role');
            $table->string('suburb', 255)->nullable()->comment('Client Role');
            $table->string('state', 100)->nullable()->comment('Client Role');
            $table->string('postcode', 10)->nullable()->comment('Client Role');
            $table->text('description')->nullable()->comment('Client Role');
            $table->enum('send_sms_notification', ['0', '1'])->default(null)->nullable()->comment('Client Role: Send sms notification to client'); // 1:Active, 0:Inactive
            $table->enum('send_email_notification', ['0', '1'])->default(null)->nullable()->comment('Client Role: Send email notification to client'); // 1:Active, 0:Inactive
            $table->enum('recieve_marketing_email', ['0', '1'])->default(null)->nullable()->comment('Client Role: Client agrees to receive marketing emails'); // 1:Active, 0:Inactive
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
