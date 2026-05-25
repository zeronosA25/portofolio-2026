<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('site_name')->default('Personal Shape');

            $table->string('hero_subtitle')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->nullable();

            $table->string('about_title')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_heading')->nullable();
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->text('about_description_3')->nullable();

            $table->json('skills')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_profiles');
    }
};
