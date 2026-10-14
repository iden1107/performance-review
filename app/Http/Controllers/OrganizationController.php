<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('parent', 'children')->orderBy('level')->get();
        return view('organizations.index', compact('organizations'));
    }

    public function show(Organization $organization)
    {
        $organization->load('parent', 'children', 'employees');
        return view('organizations.show', compact('organization'));
    }
}
