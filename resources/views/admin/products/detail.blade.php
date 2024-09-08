@extends('admin.layouts.side')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Details</h4>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Product Code:</label>
                                <p>{{ $product->code }}</p>
                            </div>

                            <div class="form-group">
                                <label>Product Name:</label>
                                <p>{{ $product->name }}</p>
                            </div>

                            <div class="form-group">
                                <label>Price (IDR):</label>
                                <p>{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</p>
                            </div>

                            <div class="form-group">
                                <label>Description:</label>
                                <p>{{ $product->description }}</p>
                            </div>

                            <div class="form-group">
                                <label>Category:</label>
                                <p>{{ $product->category }}</p>
                            </div>

                            <div class="form-group">
                                <label>Stock:</label>
                                <p>
                                    @if ($product->available_stock > 0)
                                        Tersedia
                                    @else
                                        Tidak Tersedia
                                    @endif
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Manufacturer:</label>
                                <p>{{ $product->manufacturer }}</p>
                            </div>

                            <div class="form-group">
                                <label>Model Number:</label>
                                <p>{{ $product->model_number ?? 'N/A' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Warranty (months):</label>
                                <p>{{ $product->warranty_months }}</p>
                            </div>

                            <div class="form-group">
                                <label>Weight (kg):</label>
                                <p>{{ $product->weight ?? 'N/A' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Dimensions:</label>
                                <p>{{ $product->dimensions ?? 'N/A' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Image:</label>
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
    </div>
@endsection
