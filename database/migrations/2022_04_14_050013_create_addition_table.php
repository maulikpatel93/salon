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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable()->comment('Use Only title example heading title');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('consultation', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('consultation_form', function (Blueprint $table) {
            $table->id();
            $table->enum('section_type', ['ClientDetail', 'FormSection'])->default(null)->nullable();
            $table->string('label', 255)->nullable()->comment('ClientDetail(First Name, Last Name, Email, Mobile, Address, Birthday) FormSection(Heading, Text Block, Dropdwon, Multiple Choice, Short Answer, Long Answer, Yes or No, CheckBox)');
            $table->text('labeltext')->nullable()->comment('label text example Heading: Title 1 of the Most');
            $table->string('form_type', 255)->nullable()->comment('text,select,multiselect,checkbox,date,radio,textarea');
            $table->integer('position', false, true)->nullable()->comment('position');
            $table->boolean('is_active')->default(1); // 1:Active, 0:Inactive
            $table->dateTime('is_active_at')->nullable();
            $table->timestamps();
        });

        Schema::table('consultation_form', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_id')->after('salon_id')->nullable()->comment('Type Of Consultation');
            $table->foreign('consultation_id')->references('id')->on('consultation')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('consultation_form_answer', function (Blueprint $table) {
            $table->id();
            $table->text('answer')->nullable()->comment('answer of consultation_form');
            $table->timestamps();
        });

        Schema::table('consultation_form_answer', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id')->after('id')->nullable()->comment('Type Of Salon');
            $table->foreign('salon_id')->references('id')->on('salons')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_id')->after('salon_id')->nullable()->comment('Type Of Consultation');
            $table->foreign('consultation_id')->references('id')->on('consultation')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consultation_form_id')->after('consultation_id')->nullable()->comment('Type Of Consultation form');
            $table->foreign('consultation_form_id')->references('id')->on('consultation_form')->onUpdate('cascade')->onDelete('cascade');
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
