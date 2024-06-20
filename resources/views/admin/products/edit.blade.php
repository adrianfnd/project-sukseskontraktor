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
                <form method="POST" action="{{ route('update-product', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price (IDR):</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="image_url">Current Image:</label>
                        <img src="/assets/products/{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    
                    <div class="form-group">
                        <label for="new_image">New Image:</label>
                        <input type="file" class="form-control-file" id="new_image" name="new_image">
                        <small class="form-text text-muted">Upload a new image if you want to replace the current one.</small>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{ route('admin') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
            </div>
          </div>
      </div>
  </div>
@endsection