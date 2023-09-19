@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Project Data Table</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
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
                    <a href="{{ route('project.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New
                        Project</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Decscription</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->client->name }}</td>
                                    <td>{{ $project->tag->name }}</td>
                                    <td>{{ $project->deadline }}</td>
                                    <td>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                                <a href="{{ route('project.show', $project->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>

                                                <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection


