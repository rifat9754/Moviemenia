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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText("title")->nullable();
            $table->string("date")->nullable();
            $table->foreignId("category1_id")->constrained()->nullable();
            $table->string("video_type")->nullable();
            $table->string("status")->default('Published');
            $table->string("slug")->nullable();
            $table->longText("description")->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("meta_title")->nullable();
            $table->longText("meta_description")->nullable();
            $table->longText("meta_keywords")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
