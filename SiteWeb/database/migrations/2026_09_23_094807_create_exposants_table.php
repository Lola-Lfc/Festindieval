<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exposants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags');
            $table->text('nom');
            $table->text('description');
            $table->text('activite');
            $table->string('logo')->nullable();
            $table->string('site_web')->nullable();
            $table->string('reseaux')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exposants');
    }
};