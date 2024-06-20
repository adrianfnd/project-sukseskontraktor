@extends('admin.layouts.side')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Order Table</h4>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Customer Name</th>
                                            <th>Customer Email</th>
                                            <th>
                                                <center>Months Rented</center>
                                            </th>
                                            <th>
                                                <center>Payment Status</center>
                                            </th>
                                            <th>
                                                <center>Product Status</center>
                                            </th>
                                            <th>
                                                <center>Rental Status</center>
                                            </th>
                                            <th>Created</th>
                                            <th>
                                                <center>Actions</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->customer_name }}</td>
                                                <td>{{ $order->customer_email }}</td>
                                                <td>
                                                    <center>{{ $order->months_rented }}</center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span
                                                            class="badge badge-{{ $order->status_payment == 'paid' ? 'success' : ($order->status_payment == 'pending' ? 'warning' : 'danger') }}">
                                                            {{ ucfirst($order->status_payment) }}
                                                        </span>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span
                                                            class="badge badge-{{ $order->status_product == 'rented' ? 'primary' : ($order->status_product == 'pending' ? 'warning' : 'success') }}">
                                                            {{ ucfirst($order->status_product) }}
                                                        </span>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        @if ($order->status_product == 'rented')
                                                            @if ($order->isExpired)
                                                                <span class="badge badge-danger">Expired</span>
                                                                <br>
                                                                <small>{{ abs($order->remainingDays) }} days
                                                                    ago</small>
                                                            @else
                                                                <span class="badge badge-success">Active</span>
                                                                <br>
                                                                <small>{{ $order->remainingDays }} days left</small>
                                                            @endif
                                                        @else
                                                            <span class="badge badge-secondary">N/A</span>
                                                        @endif
                                                    </center>
                                                </td>
                                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('show-order', $order->id) }}"
                                                            class="btn btn-info">View</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
