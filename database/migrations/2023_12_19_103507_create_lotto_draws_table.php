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
        Schema::create('lotto_draws', function (Blueprint $table) {
            $table->id();
            $table->json('lotto_engine_numbers');
            $table->json('user_generated_numbers');
            $table->json('matched_numbers');
            $table->boolean('is_winner');
            $table->timestamp('draw_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotto_draws');
    }
};
