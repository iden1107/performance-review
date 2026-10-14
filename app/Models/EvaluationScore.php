<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationScore extends Model
{
    protected $fillable = [
        'evaluation_target_id',
        'criterion_id',
        'self_score',
        'self_comment',
        'first_score',
        'first_comment',
        'second_score',
        'second_comment',
        'final_score',
        'special_adjustment',
        'special_reason',
    ];

    public function evaluationTarget()
    {
        return $this->belongsTo(EvaluationTarget::class);
    }

    public function criterion()
    {
        return $this->belongsTo(EvaluationCriterion::class);
    }
}
