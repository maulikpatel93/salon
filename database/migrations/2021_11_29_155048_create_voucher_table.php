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
            $table->string('start_time', 255);
            $table->text('decription');
            $table->decimal('amount', 10, 2);
            $table->string('validfor')->comment('Valid form Months');
            $table->enum('voucher_used_online', ['0', '1'])->default(0)->nullable(); // 1:Active, 0:Inactive
            $table->enum('limit_uses', ['0', '1'])->default(0)->nullable(); // 1:Active, 0:Inactive
            $table->integer('limit_uses_value', false, true)->nullable();
            $table->timestamps();
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
