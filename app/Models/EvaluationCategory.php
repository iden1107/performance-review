<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationCategory extends Model
{
    protected $fillable = ['name', 'name_en', 'weight', 'order'];

    public function criteria()
    {
        return $this->hasMany(EvaluationCriterion::class);
    }
}
