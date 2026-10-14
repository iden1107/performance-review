<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::with('employee', 'organization', 'evaluationPeriod')->get();
        return view('goals.index', compact('goals'));
    }

    public function show(Goal $goal)
    {
        $goal->load('employee', 'organization', 'evaluationPeriod');
        return view('goals.show', compact('goal'));
    }
}
