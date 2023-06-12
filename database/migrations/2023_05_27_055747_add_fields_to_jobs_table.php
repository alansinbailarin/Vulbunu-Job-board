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
            $table->text('extra_info')->nullable();
            $table->string('apply_on')->nullable();
            $table->tinyText('color')->nullable();
            $table->boolean('featured')->default(false);

            $table->unsignedBigInteger('clicks')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('seniority_id');
            $table->unsignedBigInteger('job_modality_id');
            $table->unsignedBigInteger('workday_id');
            $table->unsignedBigInteger('priority_id');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('seniority_id')->references('id')->on('seniorities')->onDelete('cascade');
            $table->foreign('job_modality_id')->references('id')->on('job_modalities')->onDelete('cascade');
            $table->foreign('workday_id')->references('id')->on('workdays')->onDelete('cascade');
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('jobs', ['title', 'slug', 'description', 'location', 'color', 'clicks', 'status', 'user_id', 'category_id', 'seniority_id', 'job_modality_id', 'workday_id', 'priority_id', 'country_id', 'state_id', 'city_id']);
    }
};
