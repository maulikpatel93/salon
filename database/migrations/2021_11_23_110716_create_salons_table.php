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
            $table->string('owner_name', 150);
            $table->string('business_email', 100)->unique();
            $table->enum('business_email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('business_email_verified_at')->nullable();
            $table->string('business_phone_number', 20)->unique();
            $table->enum('business_phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('business_phone_number_verified_at')->nullable();
            $table->string('business_telephone_number', 20)->nullable();
            $table->text('business_address');
            $table->enum('salon_type', ['Unisex', 'Ladies', 'Gents'])->default('Unisex'); // 1:Active, 0:Inactive
            $table->string('logo', 100)->nullable();
            $table->string('timezone', 100);
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tax', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->text('description');
            $table->decimal('percentage')->nullable()->comment('percentage %');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->enum('email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 20);
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
            $table->text('description');
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
            $table->string('image')->after('name')->nullable();
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
            $table->string('duration', 50)->comment('minutes');
            $table->string('padding_time', 50)->comment('minutes');
            $table->string('color', 10)->comment('color code #fcfcfcfc');
            $table->enum('service_booked_online', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->enum('deposit_booked_online', ['0', '1'])->default(0); // 1:Active, 0:Inactive
            $table->decimal('deposit_booked_price', 10, 2);
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

        Schema::create('services_price', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('add_on_price', 10, 2)->nullable();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('services_price', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->after('id')->nullable()->comment('Type Of Service');
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
        Schema::dropIfExists('salons');
    }
}
