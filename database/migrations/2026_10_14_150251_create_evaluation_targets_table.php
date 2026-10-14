<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluation_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_period_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('first_evaluator_id')->nullable()->constrained('employees')->nullOnDelete();
            $table->foreignId('second_evaluator_id')->nullable()->constrained('employees')->nullOnDelete();
            $table->string('evaluation_type');
            $table->boolean('requires_self_evaluation')->default(true);
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluation_targets');
    }
};
