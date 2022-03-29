<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 150);
            $table->string('business_email', 100)->nullable();
            $table->enum('business_email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('business_email_verified_at')->nullable();
            $table->string('business_phone_number', 20)->nullable();
            $table->enum('business_phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('business_phone_number_verified_at')->nullable();
            $table->string('business_telephone_number', 20)->nullable();
            $table->text('business_address');
            $table->enum('salon_type', ['Unisex', 'Ladies', 'Gents'])->default('Unisex'); // 1:Active, 0:Inactive
            $table->string('logo', 100)->nullable();
            $table->string('timezone', 100);
            $table->string('numberofstaff', 50)->nullable();
            $table->enum('terms', ['0', '1'])->default('0'); // 1:Active, 0:Inactive
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tax', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('percentage')->nullable()->comment('percentage %');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('tax', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100)->nullable();
            $table->enum('email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->enum('phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('logo', 100)->nullable();
            $table->text('website')->nullable();
            $table->text('address')->nullable();
            $table->string('street', 255)->nullable();
            $table->string('suburb', 255)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->text('description')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name', 150);
            $table->string('sku', 100);
            $table->text('description');
            $table->decimal('cost_price', 10, 2);
            $table->decimal('retail_price', 10, 2);
            $table->enum('manage_stock', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->integer('stock_quantity', false, true)->nullable();
            $table->integer('low_stock_threshold', false, true)->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('supplier_id')->after('salon_id')->nullable()->comment('Type Of Supplier');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tax_id')->after('supplier_id')->nullable()->comment('Type Of Category');
            $table->foreign('tax_id')->references('id')->on('tax')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('description');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('duration', 50)->nullable()->comment('minutes');
            $table->string('padding_time', 50)->nullable()->comment('minutes');
            $table->string('color', 10)->nullable()->comment('color code #fcfcfcfc');
            $table->enum('service_booked_online', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->enum('deposit_booked_online', ['0', '1'])->default(0); // 1:Active, 0:Inactive
            $table->decimal('deposit_booked_price', 10, 2)->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->after('salon_id')->nullable()->comment('Type Of Category');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tax_id')->after('category_id')->nullable()->comment('Type Of Category');
            $table->foreign('tax_id')->references('id')->on('tax')->onUpdate('cascade')->onDelete('set null');
        });

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

        Schema::create('services_price', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('add_on_price', 10, 2)->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('services_price', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->after('id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('price_tier_id')->after('service_id')->nullable()->comment('Type Of price tier');
            $table->foreign('price_tier_id')->references('id')->on('price_tier')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('staff_working_hours', function (Blueprint $table) {
            $table->id();
            $table->string('days', 50);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('break_time')->nullable();
            $table->enum('dayoff', ['0', '1'])->default('1')->nullable()->comment('1-dayon and 0-dayoff');
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
            $table->date('dateof')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
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

        Schema::create('add_on_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('add_on_services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->after('id')->nullable()->comment('Type Of Service');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('add_on_service_id')->after('service_id')->nullable()->comment('Type Of Add on Service');
            $table->foreign('add_on_service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });

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
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
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

        Schema::create('busy_time', function (Blueprint $table) {
            $table->id();
            $table->date('dateof');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->enum('repeats', ['Yes', 'No'])->default('No')->nullable(); // 1:Active, 0:Inactive
            $table->integer('repeat_time', false, true)->nullable()->comment('Week, Month');
            $table->enum('repeat_time_option', ['Weekly', 'Monthly', 'Yearly'])->default(null)->nullable();
            $table->date('ending')->nullable()->comment('Optional');
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
            $table->date('dateof')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('duration', 50)->nullable()->comment('Minutes');
            $table->decimal('cost', 10, 2)->nullable();
            $table->enum('repeats', ['Yes', 'No'])->default('No'); // 1:Active, 0:Inactive
            $table->integer('repeat_time', false, true)->nullable()->comment('Week, Month');
            $table->enum('repeat_time_option', ['Weekly', 'Monthly', 'Yearly'])->default(null)->nullable();
            $table->date('ending')->nullable()->comment('Optional');
            $table->text('booking_notes')->nullable();
            $table->enum('status', ['Scheduled', 'Confirmed', 'Completed', 'Cancelled'])->default(null)->nullable();
            $table->string('status_manage', 100)->default(null)->nullable();
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

        Schema::create('client_photos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->enum('is_profile_photo', ['0', '1'])->default(0)->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('client_photos', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('client_notes', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->dateTime('datetime')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('client_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('client_documents', function (Blueprint $table) {
            $table->id();
            $table->text('document');
            $table->dateTime('datetime')->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('client_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->after('salon_id')->nullable()->comment('Type Of Client');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('salon_working_hours', function (Blueprint $table) {
            $table->id();
            $table->string('days', 50);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('break_time')->nullable();
            $table->enum('dayoff', ['0', '1'])->default('1')->nullable()->comment('1-dayon and 0-dayoff');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('salon_working_hours', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('salons', function (Blueprint $table) {
            $table->string('number_of_staff', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
    }
}