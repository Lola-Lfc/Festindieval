<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invite_id')->constrained('invites');
            $table->text('nom');
            $table->text('description');
            $table->dateTime('dt_heure_debut');
            $table->dateTime('dt_heure_fin');
            $table->integer('jour');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};