@extends('backend.master')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h4 class="m-0">Edit {{ $woocomerce->name }} Woocomerce</h4>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('woocomerce.index') }}">Woocomerce List</a></li>
            <li class="breadcrumb-item active">Update Woocomerce</li>
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
                <form action="{{ route('woocomerce.update', $woocomerce->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $woocomerce->name }}" placeholder="Enter Woocomerce Name">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="api_url">Api URL</label>
                                <input type="text" class="form-control" id="api_url" name="api_url" value="{{ $woocomerce->api_url }}" placeholder="Enter Api Url">
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
                                <input type="text" class="form-control" id="api_key" name="api_key" value="{{ $woocomerce->api_key }}" placeholder="Enter Api Key">
                                @error('api_key')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="api_secret">Api Secret</label>
                                <input type="text" class="form-control" id="api_secret" name="api_secret" value="{{ $woocomerce->api_secret }}" placeholder="Enter Api Secret">
                                @error('api_secret')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tag_id">Satus</label>
                                <select class="form-control" id="tag_id" name="tag_id">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{  $tag->id ==      $woocomerce->tag_id ? 'Selected' : '' }}>
                                        {{ $tag->name }}

                                    </option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Woocomerce</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection