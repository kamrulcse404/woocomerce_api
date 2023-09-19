@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Client Details Report</h1>
            {{-- <a href="{{ route('client.pdf', $client->id) }}" class="btn btn-primary mt-2">Download</a> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client List</a></li>
                <li class="breadcrumb-item active">Client Report</li>
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
                            <h3 class="text-center text-muted p-2" style="background-color: azure;">{{ $client->name }}'s
                                Details Report</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row justify-content-md-center align-items-center">
                        <div class="col-md-6">
                            <h4>Name: <b>{{ $client->name }}</b></h4>
                            <h5>Email: {{ $client->email }}</h5>
                        </div>
                        <div class="col-md-6">
                            <img class="float-right" src="{{ asset('images/' . $client->image) }}" alt="image"
                                style="width: 150px; height: auto;">
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <h4 class="text-center text-muted p-2" style="background-color: azure;">Details Information
                            </h4>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Client ID: </th>
                                    <td>{{ $client->id }}</td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td>{{ $client->email }}</td>
                                </tr>
                                <tr>
                                    <th>Company Name: </th>
                                    <td>{{ $client->company_name }}</td>
                                </tr>
                                <tr>
                                    <th>Company City: </th>
                                    <td>{{ $client->company_city }}</td>
                                </tr>
                                <tr>
                                    <th>Company Tin: </th>
                                    <td>{{ $client->company_tin }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 mt-3">
                            <table class="table">
                                <tr>
                                    <th>Client Name: </th>
                                    <td>{{ $client->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number: </th>
                                    <td>{{ $client->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Company Address: </th>
                                    <td>{{ $client->company_address }}</td>
                                </tr>
                                <tr>
                                    <th>Company Zip: </th>
                                    <td>{{ $client->company_zip }}</td>
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
