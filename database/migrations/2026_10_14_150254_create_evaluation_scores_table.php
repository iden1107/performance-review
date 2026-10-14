<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluation_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_target_id')->constrained()->cascadeOnDelete();
            $table->foreignId('criterion_id')->constrained('evaluation_criteria')->cascadeOnDelete();
            $table->integer('self_score')->nullable();
            $table->text('self_comment')->nullable();
            $table->integer('first_score')->nullable();
            $table->text('first_comment')->nullable();
            $table->integer('second_score')->nullable();
            $table->text('second_comment')->nullable();
            $table->integer('final_score')->nullable();
            $table->integer('special_adjustment')->default(0);
            $table->text('special_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluation_scores');
    }
};
