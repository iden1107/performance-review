<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationPeriod extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'is_active'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function evaluationTargets()
    {
        return $this->hasMany(EvaluationTarget::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
