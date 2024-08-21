@extends('admin.layouts.side')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Product Table</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="card-description">
                                        <a href="{{ route('create-product') }}" class="btn btn-primary">Create
                                            Product</a>
                                    </p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Created</th>
                                            <th>
                                                <center>Actions</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}
                                                </td>
                                                <td><img src="/assets/products/{{ $product->image_url }}"
                                                        alt="{{ $product->name }}" width="50" height="50"></td>
                                                <td>{{ $product->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('show-product', $product->id) }}"
                                                            class="btn btn-info">View</a>
                                                        <a href="{{ route('edit-product', $product->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('delete-product', $product->id) }}"
                                                            method="POST" style="display: inline;"
                                                            id="delete-form-{{ $product->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger delete-btn"
                                                                data-id="{{ $product->id }}">Delete</button>
                                                        </form>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + productId).submit();
                        }
                    });
                });
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                });
            @endif
        });
    </script>
@endsection
