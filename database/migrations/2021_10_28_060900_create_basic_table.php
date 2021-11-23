<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //php artisan make:migration create_roles_table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('panel', ['Backend', 'Frontend', 'Common'])->default('Backend'); // 1:Active, 0:Inactive
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        //php artisan make:migration create_users_table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('auth_key', 80)->after('id')
                ->unique()
                ->nullable()
                ->default(null);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('username', 100);
            $table->string('email', 100)->unique();
            $table->enum('email_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number', 20);
            $table->enum('phone_number_verified', [1, 0])->default(0); // 1:Verify, 0:Inverify
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('profile_photo', 100);
            $table->rememberToken();
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('id')->nullable()->comment('Type Of Role');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });

        //php artisan make:migration create_password_reset_table
        Schema::create('password_reset', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        //php artisan make:migration create_failed_jobs_table
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        //php artisan make:migration create_modules_table
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('controller', 100);
            $table->string('action', 100);
            $table->string('icon', 55);
            $table->enum('functionality', ['crud', 'singleview', 'other', 'none'])->default('crud');
            $table->enum('type', ['Menu', 'Submenu', 'Subsubmenu'])->default('Menu');
            $table->integer('parent_menu_id', false, true)->nullable();
            $table->integer('parent_submenu_id', false, true)->nullable();
            $table->integer('menu_position', false, true)->nullable();
            $table->integer('submenu_position', false, true)->nullable();
            $table->enum('is_hiddden', ['0', '1'])->default('0');
            $table->enum('is_active', ['0', '1'])->default('1'); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        //php artisan make:migration create_permissions_table
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->enum('panel', ['Backend', 'Frontend', 'App', 'Common'])->default('Backend');
            $table->string('title', 200);
            $table->string('name', 100);
            $table->string('controller', 100);
            $table->string('action', 100);
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->after('id')->nullable()->comment('Type Of Module');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('cascade')->onDelete('cascade');
        });

        //php artisan make:migration create_roles_access_table
        Schema::create('roles_access', function (Blueprint $table) {
            $table->id();
            $table->enum('access', ['0', '1'])->default('1'); // 1:Active, 0:Inactive
            $table->timestamps();
        });

        Schema::table('roles_access', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('id')->nullable()->comment('Type Of Role');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('permission_id')->after('role_id')->nullable()->comment('Type Of Permission');
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
        });

        //php artisan make:migration create_users_access_table
        Schema::create('users_access', function (Blueprint $table) {
            $table->id();
            $table->enum('access', ['0', '1'])->default('1'); // 1:Active, 0:Inactive
            $table->timestamps();
        });

        Schema::table('users_access', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable()->comment('Type Of Role');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('permission_id')->after('user_id')->nullable()->comment('Type Of Permission');
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
        });

        //php artisan make:migration create_configuration_table
        Schema::create('configuration', function (Blueprint $table) {
            $table->integer('id', 20);
            $table->string('name')->unique();
            $table->text('value');
            $table->text('description');
            $table->enum('type', ['Text', 'Textarea', 'File', 'Date', 'Time', 'Datetime', 'Radio', 'Checkbox', 'Select', 'Other'])->default('Text');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        //php artisan make:migration create_custom_pages_table
        Schema::create('custom_pages', function (Blueprint $table) {
            $table->integer('id', 20);
            $table->string('name')->unique();
            $table->text('title');
            $table->text('description');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        //php artisan make:migration create_email_templates_table
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->string('subject')->nullable();
            $table->text('html');
            $table->enum('type', ['Backend', 'Web', 'App', 'Common'])->default('Common');
            $table->enum('is_active', ['0', '1'])->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        //php artisan make:migration create_email_templates_field_table
        Schema::create('email_templates_field', function (Blueprint $table) {
            $table->id();
            $table->string('field');
            $table->text('description');
            $table->enum('is_default', [1, 0])->default(0); // 1:Active, 0:Inactive
            $table->timestamps();
        });

        Schema::table('email_templates_field', function (Blueprint $table) {
            $table->unsignedBigInteger('email_template_id')->after('id')->nullable()->comment('Type Of Email Template');
            $table->foreign('email_template_id')->references('id')->on('email_templates')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists([
            'email_templates_field',
            'email_templates',
            'custom_pages',
            'configuration',
            'users_access',
            'roles_access',
            'permission',
            'modules',
            'failed_jobs',
            'password_reset',
            'users',
            'roles',
        ]);
    }
}
