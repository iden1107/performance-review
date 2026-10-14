<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('organization', 'position')->get();
        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        $employee->load('organization', 'position', 'evaluationTargets.evaluationPeriod', 'goals');
        return view('employees.show', compact('employee'));
    }
}
