<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'name_en', 'organization_id', 'position_id', 'role', 'is_concurrent', 'email', 'status'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function evaluationTargets()
    {
        return $this->hasMany(EvaluationTarget::class, 'employee_id');
    }

    public function firstEvaluations()
    {
        return $this->hasMany(EvaluationTarget::class, 'first_evaluator_id');
    }

    public function secondEvaluations()
    {
        return $this->hasMany(EvaluationTarget::class, 'second_evaluator_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
