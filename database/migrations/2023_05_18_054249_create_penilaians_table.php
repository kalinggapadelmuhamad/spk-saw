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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('alternatif_id')->constrained('alternatifs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kriteria_id')->constrained('kriterias')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_kriteria_id')->constrained('sub_kriterias')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
