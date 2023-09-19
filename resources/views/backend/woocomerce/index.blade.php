@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Woocomerce Data Table</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Woocomerce</li>
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
                    <a href="{{ route('woocomerce.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New
                    Woocomerce</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Api Url</th>
                                <th>Api Key</th>
                                <th>Api Secret</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($woocomerces as $woocomerce)
                                <tr>
                                    <td>{{ $woocomerce->id }}</td>
                                    <td>{{ $woocomerce->name }}</td>
                                    <td>{{ $woocomerce->api_url }}</td>
                                    <td>{{ $woocomerce->api_key }}</td>
                                    <td>{{ $woocomerce->api_secret }}</td>
                                    <td>{{ $woocomerce->tag->name }}</td>
                                    <td>
                                        <form action="{{ route('woocomerce.destroy', $woocomerce->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ route('woocomerce.edit', $woocomerce->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

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


