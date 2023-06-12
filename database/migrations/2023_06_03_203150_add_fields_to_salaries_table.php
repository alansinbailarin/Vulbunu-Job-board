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
        Schema::table('salaries', function (Blueprint $table) {
            $table->unsignedBigInteger('min')->nullable();
            $table->unsignedBigInteger('max')->nullable();

            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('salary_type_id');
            $table->unsignedBigInteger('periodicity_id');

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('salary_type_id')->references('id')->on('salary_types')->onDelete('cascade');
            $table->foreign('periodicity_id')->references('id')->on('periodicities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('salaries', ['min', 'max', 'job_id', 'currency_id', 'salary_type_id', 'periodicity_id']);
    }
};
