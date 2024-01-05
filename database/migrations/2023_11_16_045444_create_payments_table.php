<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string("order_id");
            $table->string("payeer_id");
            $table->string("payment_id");
            $table->string('payment_source');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_amount');
            $table->string('payment_currency');
            $table->string("payeer_country");
            $table->string("payeer_postal_code");
            $table->string("payeer_address");
            $table->string("soft_descriptor");

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
