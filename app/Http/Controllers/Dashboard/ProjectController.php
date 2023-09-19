<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $tags = Tag::all();
        $employees = Employee::all();
        // dd($employees);
        return view('backend.project.create', compact('clients', 'tags', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formRequest = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'client_id' => 'required|not_in:--Select--',
            'tag_id' => 'required|not_in:--Select--',
            'deadline' => 'required',
            'employee_id' => 'required',
        ]);

        // dd($formRequest['employee_id']);

        $project = Project::create($formRequest);
        $project->employees()->attach($formRequest['employee_id']);
        return redirect()->route('project.index')->with('success', 'Project created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $employees = $project->employees()->get();
        return view('backend.project.show', compact('project', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $tags = Tag::all();
        $employees = Employee::all();
        $project = Project::find($id);
        return view('backend.project.edit', compact('clients', 'tags', 'employees', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formRequest = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'client_id' => 'required',
            'tag_id' => 'required',
            'deadline' => 'required',
        ]);

        Project::Where('id', $id)->update($formRequest);
        if ($request->has('employee_id')) {
            $formRequest = $request->validate([
                'employee_id' => 'required',
            ]);
        }
        $formRequest['employee_id'] = $request->employee_id;
        $project = Project::find($id);
        $project->employees()->sync($formRequest['employee_id']);
        return redirect()->route('project.index')->with('success', 'Project updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->employees()->detach();
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully !!');
    }
}
