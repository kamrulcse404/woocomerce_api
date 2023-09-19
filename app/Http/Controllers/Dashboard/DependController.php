<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class DependController extends Controller
{
    public function getProjects($id)
    {
        $projects = Project::where('client_id', $id)->get();

        return response()->json($projects);
    }

    public function getEmployees($id)
    {
        $employees = Project::find($id)->employees()->get()->toArray();
        // dd($employees);
        return response()->json($employees);
    }
}
