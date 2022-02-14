<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_modules', function (Blueprint $table) {
            $table->id();
            $table->enum('panel', ['Staff', 'Client', 'Common'])->default(null)->nullable(); // 1:Active, 0:Inactive
            $table->string('title', 100);
            $table->string('controller', 100)->nullable();
            $table->string('action', 100)->nullable();
            $table->string('icon', 55);
            $table->enum('functionality', ['crud', 'singleview', 'other', 'none'])->default('crud');
            $table->enum('type', ['Menu', 'Submenu', 'Subsubmenu', 'Tab'])->default('Menu');
            $table->integer('parent_menu_id', false, true)->nullable();
            $table->integer('parent_submenu_id', false, true)->nullable();
            $table->integer('menu_position', false, true)->nullable();
            $table->integer('submenu_position', false, true)->nullable();
            $table->enum('is_hiddden', ['0', '1'])->default('0');
            $table->enum('is_active', ['0', '1'])->default('1'); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::create('salon_permissions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Staff', 'Client', 'Common'])->default(null)->nullable();
            $table->string('title', 200);
            $table->string('name', 100)->comment('Ony use view / No any api call');
            $table->string('controller', 100)->comment('Not any api call url controller in laravel api');
            $table->string('action', 100)->comment('Not any api call or Url method in laravel api');
        });

        Schema::table('salon_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_module_id')->after('id')->nullable()->comment('Type Of Salon Module');
            $table->foreign('salon_module_id')->references('id')->on('salon_modules')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('salon_access', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Staff', 'Client'])->default(null)->nullable();
            $table->enum('access', ['0', '1'])->default('0')->nullable();
        });

        Schema::table('salon_access', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('salon_permission_id')->after('salon_id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_permission_id')->references('id')->on('salon_permissions')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->after('salon_permission_id')->nullable()->comment('Type Of Staff');
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
        Schema::dropIfExists('staff_access');
    }
}