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
        Schema::table('payment', function (Blueprint $table) {
            $table->string('payment_intent', 255)->nullable()->comment('Only Stripe Payment Use');
            $table->string('payment_intent_client_secret', 400)->nullable()->comment('Only Stripe Payment Use');
            $table->string('redirect_status', 255)->nullable()->comment('Only Stripe Payment Use');
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