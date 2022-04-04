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
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->decimal('credit', 10, 2)->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });
        Schema::table('membership', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->decimal('text', 10, 2)->after('qty')->nullable();

            $table->unsignedBigInteger('voucher_id')->after('product_id')->nullable()->comment('Type Of Voucher');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('membership_id')->after('voucher_id')->nullable()->comment('Type Of membership');
            $table->foreign('membership_id')->references('id')->on('membership')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('sale', function (Blueprint $table) {
            $table->id();
            $table->date('eventdate')->after('appointment_id')->nullable()->comment('calendar event date');
            $table->date('invoicedate')->change()->nullable()->comment('sale Invoice date');
            $table->dropColumn('voucher_id');
            $table->dropColumn('voucherprice');
        });

        Schema::table('voucher', function (Blueprint $table) {
            $table->datetime('expiry_at')->nullable()->comment('voucher expiry datetime');
        });

        Schema::create('apply_voucher', function (Blueprint $table) {
            $table->string('name', 255);
            $table->string('code', 16)->unique();
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::table('apply_voucher', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('voucher_id')->after('salon_id')->nullable()->comment('Type Of Voucher');
            $table->foreign('voucher_id')->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('more');
    }
};