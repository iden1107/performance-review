<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationTarget extends Model
{
    protected $fillable = [
        'evaluation_period_id',
        'employee_id',
        'first_evaluator_id',
        'second_evaluator_id',
        'evaluation_type',
        'requires_self_evaluation',
        'notes',
    ];

    protected $casts = [
        'requires_self_evaluation' => 'boolean',
    ];

    public function evaluationPeriod()
    {
        return $this->belongsTo(EvaluationPeriod::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function firstEvaluator()
    {
        return $this->belongsTo(Employee::class, 'first_evaluator_id');
    }

    public function secondEvaluator()
    {
        return $this->belongsTo(Employee::class, 'second_evaluator_id');
    }

    public function scores()
    {
        return $this->hasMany(EvaluationScore::class);
    }
}
