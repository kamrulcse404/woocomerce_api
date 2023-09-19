<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('backend.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $clients = Client::all();
        return view('backend.task.create', compact('tags', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formRequest = $request->validate([
            'client_id' => 'required',
            'project_id' => 'required',
            'employee_id' =>  'required',
            'task_title' => 'required',
            'task_description' => 'required',
            'deadline' => 'required',
            'tag_id' => 'required|not_in:--Select--',
        ]);

        // dd($formRequest['employee_id']);

        $task = Task::create($formRequest);

        $task->employees()->attach( $formRequest['employee_id']);
        return redirect()->route('task.index')->with('success', 'Task created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $employees = $task->employees()->get();
        // dd($task);
        return view('backend.task.show', compact('task', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $tags = Tag::all();
        $clients = Client::all();
        return view('backend.task.edit', compact('task', 'tags', 'clients'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->employees()->detach();
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully !!');
    }

}
