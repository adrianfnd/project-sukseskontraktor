@extends('admin.layouts.side')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card" id="printableCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title">Order Details</h4>
                                @if ($order->status_payment != 'pending')
                                    <button id="printButton" class="btn btn-primary">Print Order</button>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Customer Information</h5>
                                        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                        <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Order Information</h5>
                                        <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                                        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y H:i:s') }}</p>
                                        <p><strong>Status:</strong>
                                            <span
                                                class="badge badge-{{ $order->status_payment == 'paid' ? 'success' : ($order->status_payment == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($order->status_payment) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <h5>Product Details</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Months Rented</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ 'Rp. ' . number_format($order->product->price, 0, ',', '.') }}</td>
                                                <td>{{ $order->months_rented }}</td>
                                                <td>{{ 'Rp. ' . number_format($order->product->price * $order->months_rented, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-right">Grand Total:</th>
                                                <th>{{ 'Rp. ' . number_format($order->product->price * $order->months_rented, 0, ',', '.') }}
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <hr>

                                <h5>Rental Status</h5>
                                <p><strong>Status:</strong>
                                    <span
                                        class="badge badge-{{ $order->status_product == 'rented' ? 'primary' : ($order->status_product == 'pending' ? 'warning' : 'success') }}">
                                        {{ ucfirst($order->status_product) }}
                                    </span>
                                </p>

                                @if ($order->status_product == 'rented')
                                    <div id="rentalPeriod">
                                        <p><strong>Rental Period:</strong> {{ $order->updated_at->format('d M Y') }} to
                                            {{ $rentalEnd->format('d M Y') }}</p>
                                        @if ($isExpired)
                                            <p><strong>Status:</strong> <span class="badge badge-danger">Expired</span></p>
                                            <p>Rental period ended {{ abs($remainingDays) }} days ago.</p>
                                        @else
                                            <p><strong>Status:</strong> <span class="badge badge-success">Active</span></p>
                                            <p>{{ $remainingDays }} days remaining in the rental period.</p>
                                        @endif
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <a href="{{ route('order') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style media="print">
        body * {
            visibility: hidden;
        }

        #printableCard,
        #printableCard * {
            visibility: visible;
        }

        #printableCard {
            position: absolute;
            left: 0;
            top: 0;
        }

        #printButton {
            display: none;
        }

        #rentalPeriod {
            display: none;
        }

        .btn {
            display: none;
        }
    </style>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>
@endsection
