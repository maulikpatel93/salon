<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 16)->unique();
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->integer('valid', false, true)->comment('Valid for Months');
            $table->enum('used_online', ['0', '1'])->default(0)->nullable(); // 1:Active, 0:Inactive
            $table->enum('limit_uses', ['0', '1'])->default(1)->nullable(); // 1:Active, 0:Inactive
            $table->integer('limit_uses_value', false, true)->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });
        Schema::table('voucher', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('voucher_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::table('voucher_services', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->after('id')->nullable()->comment('Type Of Voucher');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('voucher_id')->nullable()->comment('Type Of Voucher Service include');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tax', function (Blueprint $table) {
            $table->decimal('percentage')->after('description')->nullable()->comment('percentage %');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher');
    }
}
