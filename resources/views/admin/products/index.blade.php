@extends('admin.layouts.side')

@section('content')
<div class="main-panel">
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
                    <a href="{{ route('create-product') }}" class="btn btn-primary">Create Product</a>
                  </p>
                </div>
              </div>
              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if(session('error'))
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
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $index => $product)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</td>
                      <td><img src="/assets/products/{{ $product->image_url }}" alt="{{ $product->name }}" width="50"></td>
                      <td>{{ $product->created_at->format('d M Y') }}</td>
                      <td>
                        <a href="{{ route('show-product', $product->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('edit-product', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-product', $product->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
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