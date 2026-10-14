<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'name_short', 'level', 'category'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
