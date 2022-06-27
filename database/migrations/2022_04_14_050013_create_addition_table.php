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
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable()->comment('Use Only title example heading title');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('form', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('form_element_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000)->nullable();
            $table->string('icon', 1000)->nullable();
            $table->string('form_type', 255)->nullable()->comment('text,select,multiselect,checkbox,date,radio,textarea');
            $table->enum('section_type', ['ClientDetail', 'FormSection'])->default(null)->nullable();
            $table->boolean('can_repeat')->default(0);
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::create('form_element', function (Blueprint $table) {
            $table->id();
            $table->enum('section_type', ['ClientDetail', 'FormSection'])->default(null)->nullable();
            // $table->string('label', 255)->nullable()->comment('ClientDetail(First Name, Last Name, Email, Mobile, Address, Birthday) FormSection(Heading, Text Block, Dropdwon, Multiple Choice, Short Answer, Long Answer, Yes or No, CheckBox)');
            $table->text('caption')->nullable()->comment('label text example Heading: Title 1 of the Most');
            $table->string('form_type', 255)->nullable()->comment('text,select,multiselect,checkbox,date,radio,textarea');
            $table->integer('position', false, true)->nullable()->comment('position');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('form_element', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('form_id')->after('salon_id')->nullable()->comment('Type Of Form');
            $table->foreign('form_id')->references('id')->on('form')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('form_element_type_id')->after('salon_id')->nullable()->comment('Type Of Form Element');
            $table->foreign('form_element_type_id')->references('id')->on('form_element_type')->onUpdate('cascade')->onDelete('cascade');
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
