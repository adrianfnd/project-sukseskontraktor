@extends('admin.layouts.side')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Product</h4>
                            <div class="card-body">
                                <form method="POST" action="{{ route('update-product', $product->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $product->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price (IDR):</label>
                                        <input type="number" step="0.01" class="form-control" id="price"
                                            name="price" value="{{ $product->price }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ $product->category }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock">Stock:</label>
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            value="{{ $product->stock }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="manufacturer">Manufacturer:</label>
                                        <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                                            value="{{ $product->manufacturer }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="model_number">Model Number:</label>
                                        <input type="text" class="form-control" id="model_number" name="model_number"
                                            value="{{ $product->model_number }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="warranty_months">Warranty (months):</label>
                                        <input type="number" class="form-control" id="warranty_months"
                                            name="warranty_months" value="{{ $product->warranty_months }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="weight">Weight (kg):</label>
                                        <input type="number" step="0.01" class="form-control" id="weight"
                                            name="weight" value="{{ $product->weight }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="dimensions">Dimensions:</label>
                                        <input type="text" class="form-control" id="dimensions" name="dimensions"
                                            value="{{ $product->dimensions }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image_url">Current Image:</label>
                                        <img src="/assets/products/{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="img-thumbnail" style="max-width: 200px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="new_image">New Image:</label>
                                        <input type="file" class="form-control-file" id="new_image" name="new_image">
                                        <small class="form-text text-muted">Upload a new image if you want to replace the
                                            current one.</small>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                        <a href="{{ route('product') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
