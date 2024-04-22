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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // Main fields
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('lead')->nullable();
            $table->longText('content');
            $table->json('tags')->nullable();

            // unique string for each article to be used in the URL for SEO
            $table->string('slug')->unique();

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Files and media
            $table->string('primary_image')->nullable();
            $table->json('images')->nullable();
            $table->string('primary_document')->nullable();
            $table->json('documents')->nullable();
            $table->string('primary_file')->nullable();
            $table->json('files')->nullable();
            $table->string('primary_video')->nullable();
            $table->json('videos')->nullable();
            $table->string('primary_audio')->nullable();
            $table->json('audios')->nullable();

            // Relations
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('articles')->onDelete('set null');

            // Theme
            $table->string('primary_color')->default('#000000');
            $table->string('secondary_color')->default('#000000');

            // Geolocation
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            // Stats
            $table->string('min_read')->default(0);
            $table->string('view_count')->default(0);
            $table->string('clap_count')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
