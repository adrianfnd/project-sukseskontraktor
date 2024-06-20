@extends('admin.layouts.side')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create Product</h4>
              <div class="card-body">
                <form method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price (IDR):</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" required>
                        <small class="form-text text-muted">Upload an image for the product.</small>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                        <a href="{{ route('admin') }}" class="btn btn-secondary">Back</a>
                    </div>    
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection