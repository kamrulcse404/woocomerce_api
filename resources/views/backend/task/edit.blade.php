@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Task {{ $task->task_title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Task List</a></li>
                <li class="breadcrumb-item active">Edit Task</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('task.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                        Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select class="form-control" id="client_id" name="client_id">
                                        <option>--Select--</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ $client->id == $task->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_id">Project Name</label>
                                    <select class="form-control" id="project_id" name="project_id">
                                        <option>--Select--</option>
                                    </select>
                                    @error('project_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_id">Assign Employee</label>
                                    <select class="js-example-basic-multiple form-control" id="employee_id"
                                        name="employee_id[]" multiple="multiple">
                                        <option></option>
                                    </select>
                                    @error('employee_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="task_title">Task Title</label>
                                    <input type="text" class="form-control" id="task_title" name="task_title"  value="{{ $task->task_title }}">
                                    @error('task_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="task_description">Task Description</label>
                                    <textarea type="text" class="form-control" id="task_description" name="task_description" value="{{ old('task_description') }}">{{ $task->task_description }}</textarea>
                                    @error('task_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" name="deadline" value="{{ $task->deadline }}" class="form-control"/>
                                    </div>
                                    @error('deadline')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tag_id">Status</label>
                                    <select class="form-control" id="tag_id" name="tag_id">
                                        <option>--Select--</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $tag->id == $task->tag_id ? 'Selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Task</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection


