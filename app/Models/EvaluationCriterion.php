<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationCriterion extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'standards',
        'max_score',
        'order',
        'evaluation_type',
    ];

    public function category()
    {
        return $this->belongsTo(EvaluationCategory::class);
    }

    public function scores()
    {
        return $this->hasMany(EvaluationScore::class);
    }
}
