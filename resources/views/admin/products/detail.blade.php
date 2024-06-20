@extends('admin.layouts.side')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product Details</h4>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <p>{{ $product->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price (IDR):</label>
                                    <p>{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <img src="/assets/products/{{ $product->image_url }}" alt="{{ $product->name }}"
                                        class="img-thumbnail" style="max-width: 200px;">
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('edit-product', $product->id) }}" class="btn btn-warning">Edit
                                        Product</a>
                                    <a href="{{ route('product') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
