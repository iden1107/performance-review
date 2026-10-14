<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'name_en', 'parent_id', 'level', 'category'];

    public function parent()
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Organization::class, 'parent_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
