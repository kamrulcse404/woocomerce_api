<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $clients = Client::all();
        $projects = Project::all();
        $employees = Employee::all();
        $tasks = Task::all();
        return view('backend.dashboard.home', compact('clients', 'projects', 'employees', 'tasks'));
    }
}
