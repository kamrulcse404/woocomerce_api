@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Task Details Report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Task List</a></li>
                <li class="breadcrumb-item active">Task Report</li>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center text-muted p-2" style="background-color: azure;">{{ $task->task_title }}'s
                                Task Details Report</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Project Name: <b>{{ $task->project->title }}</b></h4>
                            <h5>Client Name: <b>{{ $task->client->name }}</b></h5>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <h4 class="text-center text-muted p-2" style="background-color: azure;">Project Information
                            </h4>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Project ID: </th>
                                    <td>{{ $task->project->id }}</td>
                                </tr>
                                <tr>
                                    <th>Project Description: </th>
                                    <td>{{ $task->project->description }}</td>
                                </tr>
                                <tr>
                                    <th>Project Status: </th>
                                    <td>{{ $task->tag->name }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Project Title: </th>
                                    <td>{{ $task->project->title }}</td>
                                </tr>
                                <tr>
                                    <th>Project Deadline: </th>
                                    <td>{{ $task->project->deadline }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <h4 class="text-center text-muted p-2" style="background-color: azure;">Client Information
                            </h4>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Client ID: </th>
                                    <td>{{ $task->client->id }}</td>
                                </tr>
                                <tr>
                                    <th>Client Email: </th>
                                    <td>{{ $task->client->email }}</td>
                                </tr>
                                <tr>
                                    <th>Company Name: </th>
                                    <td>{{ $task->client->company_name }}</td>
                                </tr>
                                <tr>
                                    <th>Company City: </th>
                                    <td>{{ $task->client->company_city }}</td>
                                </tr>
                                <tr>
                                    <th>Company Tin: </th>
                                    <td>{{ $task->client->company_tin }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Client Name: </th>
                                    <td>{{ $task->client->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number: </th>
                                    <td>{{ $task->client->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Company Name: </th>
                                    <td>{{ $task->client->company_address }}</td>
                                </tr>
                                <tr>
                                    <th>Company Zip: </th>
                                    <td>{{ $task->client->company_zip }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <h4 class="text-center text-muted p-2" style="background-color: azure;">Employee Information
                            </h4>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Employee ID </th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>Phone </th>
                                    <th>Designation </th>
                                </tr>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->designation->name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <h4 class="text-center text-muted p-2" style="background-color: azure;">Task Information
                            </h4>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Task ID: </th>
                                    <td>{{ $task->id }}</td>
                                </tr>
                                <tr>
                                    <th>Task Title: </th>
                                    <td>{{ $task->task_title }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Task Details: </th>
                                    <td>{{ $task->task_description }}</td>
                                </tr>
                                <tr>
                                    <th>Deadline: </th>
                                    <td>{{ $task->deadline }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
