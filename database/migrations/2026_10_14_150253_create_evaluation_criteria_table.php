<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluation_criteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('evaluation_categories')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('standards')->nullable();
            $table->integer('max_score')->default(0);
            $table->integer('order')->default(0);
            $table->string('evaluation_type')->default('general');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluation_criteria');
    }
};
