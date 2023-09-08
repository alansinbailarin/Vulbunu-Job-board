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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();

            $table->string('interviewer_name')->nullable();
            $table->dateTime('interview_date');
            $table->enum('interview_type', ['presential', 'virtual']);
            $table->text('interview_link')->nullable();
            $table->time('interview_duration')->nullable();
            $table->text('interview_observation')->nullable();
            $table->text('interview_feedback')->nullable();
            $table->dateTime('confirmation_date')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->unsignedBigInteger('applicant_id');

            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
