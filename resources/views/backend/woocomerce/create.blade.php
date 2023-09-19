@extends('backend.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Create New Woocomerce</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('woocomerce.index') }}">Woocomerce List</a></li>
                <li class="breadcrumb-item active">New Woocomerce</li>
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
                    <a href="{{ route('woocomerce.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                        Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('woocomerce.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Woocomerce Name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="api_url">Api URL</label>
                                    <input type="text" class="form-control" id="api_url" name="api_url"
                                        value="{{ old('api_url') }}" placeholder="Enter Api URL">
                                    @error('api_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="api_key">Api Key</label>
                                    <input type="text" class="form-control" id="api_key" name="api_key"
                                        value="{{ old('api_key') }}" placeholder="Enter Api Key">
                                    @error('api_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="api_secret">Api Secret</label>
                                    <input type="text" class="form-control" id="api_secret" name="api_secret"
                                        value="{{ old('api_secret') }}" placeholder="Enter Api Secret">
                                    @error('api_secret')
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
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> New Woocomerce</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
