@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Designation Data Table</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Designations</li>
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
                    <a href="{{ route('designation.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New
                        Designation</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Designation Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $designation)
                                <tr>
                                    <td>{{ $designation->id }}</td>
                                    <td>{{ $designation->name }}</td>
                                    <td>
                                        <form action="{{ route('designation.destroy', $designation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ route('designation.edit', $designation->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
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


