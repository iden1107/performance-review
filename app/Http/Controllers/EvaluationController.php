<?php

namespace App\Http\Controllers;

use App\Models\EvaluationTarget;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $targets = EvaluationTarget::with('employee', 'evaluationPeriod', 'firstEvaluator', 'secondEvaluator')->get();
        return view('evaluations.index', compact('targets'));
    }

    public function show(EvaluationTarget $target)
    {
        $target->load('employee', 'evaluationPeriod', 'firstEvaluator', 'secondEvaluator', 'scores.criterion');
        return view('evaluations.show', compact('target'));
    }
}
