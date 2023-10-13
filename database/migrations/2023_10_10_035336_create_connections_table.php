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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id_sender');
            $table->unsignedBigInteger('user_id_receiver');

            $table->foreign('user_id_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_receiver')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
