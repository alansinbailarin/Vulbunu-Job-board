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
        Schema::table('jobs', function (Blueprint $table) {
            $table->tinyText('title');
            $table->tinyText('slug');
            $table->text('description');
            $table->tinyText('location');
            $table->tinyText('color')->nullable();
            $table->boolean('featured')->default(false);

            $table->unsignedBigInteger('clicks')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('seniority_id');
            $table->unsignedBigInteger('job_modality_id');
            $table->unsignedBigInteger('workday_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('seniority_id')->references('id')->on('seniorities')->onDelete('cascade');
            $table->foreign('job_modality_id')->references('id')->on('job_modalities')->onDelete('cascade');
            $table->foreign('workday_id')->references('id')->on('workdays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('jobs', ['title', 'slug', 'description', 'location', 'color', 'clicks', 'status']);
    }
};
