<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags');
            $table->text('nom');
            $table->text('description')->nullable();
            $table->string('pfp')->nullable();
            $table->text('activite');
            $table->text('youtube')->nullable();
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('site_web')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};