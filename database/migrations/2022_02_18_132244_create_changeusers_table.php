<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('salon_access');
        Schema::dropIfExists('salon_permissions');
        Schema::create('salon_permissions', function (Blueprint $table) {
            $table->id();
            $table->enum('panel', ['Staff', 'Client', 'Common'])->default(null)->nullable();
            $table->string('title', 200);
            $table->string('name', 100)->comment('Ony use view / No any api call');
            $table->string('controller', 100)->comment('Not any api call url controller in laravel api');
            $table->string('action', 100)->comment('Not any api call or Url method in laravel api');
            $table->enum('is_active', ['0', '1'])->default('1'); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
        });

        Schema::table('salon_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_module_id')->after('id')->nullable()->comment('Type Of Salon Module');
            $table->foreign('salon_module_id')->references('id')->on('salon_modules')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('salon_access', function (Blueprint $table) {
            $table->id();
            $table->enum('access', ['0', '1'])->default('0')->nullable();
        });

        Schema::table('salon_access', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('role_id')->after('salon_id')->nullable()->comment('Type Of Role');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('salon_permission_id')->after('role_id')->nullable()->comment('Type Of Salon Pemission');
            $table->foreign('salon_permission_id')->references('id')->on('salon_permissions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salon_permissions');
    }
}