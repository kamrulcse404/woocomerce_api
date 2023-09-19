@extends('backend.master')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h4 class="m-0">Order Data Table</h4>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_orders as $user_order)
                        @foreach ($user_order as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['date_created'] }}</td>
                            <?php $full_name = $order['billing']['first_name'].' '.$order['billing']['last_name'] ?>
                            <td>{{ $full_name }}</td>
                            <td>{{ $order['billing']['phone'] }}</td>
                            <td>{{ $order['total'] }}</td>
                            <?php $address = $order['billing']['address_1'].' '.$order['billing']['address_2'] ?>
                            <td>{{ $address }}</td>
                        </tr>
                        @endforeach
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