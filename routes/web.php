<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('organizations.index');
});

Route::resource('organizations', OrganizationController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('evaluations', EvaluationController::class);
Route::resource('goals', GoalController::class);
