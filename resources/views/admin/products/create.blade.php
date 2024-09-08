@extends('admin.layouts.side')

@section('content')
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
                                    <label for="code">Product Code:</label>
                                    <input type="text" class="form-control" id="code" name="code" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="price">Price (IDR):</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price"
                                        required>
                                </div>
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="category">Category:</label>
                                    <input type="text" class="form-control" id="category" name="category" required>
                                </div>
                                @if ($errors->has('category'))
                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="available_stock">Stock:</label>
                                    <select class="form-control" id="available_stock" name="available_stock" required>
                                        <option value="1">Tersedia</option>
                                        <option value="0">Tidak Tersedia</option>
                                    </select>
                                </div>
                                @if ($errors->has('available_stock'))
                                    <p class="text-danger">{{ $errors->first('available_stock') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="manufacturer">Manufacturer:</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                                        required>
                                </div>
                                @if ($errors->has('manufacturer'))
                                    <p class="text-danger">{{ $errors->first('manufacturer') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="model_number">Model Number:</label>
                                    <input type="text" class="form-control" id="model_number" name="model_number">
                                </div>
                                @if ($errors->has('model_number'))
                                    <p class="text-danger">{{ $errors->first('model_number') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="warranty_months">Warranty (months):</label>
                                    <input type="number" class="form-control" id="warranty_months" name="warranty_months"
                                        value="0">
                                </div>
                                @if ($errors->has('warranty_months'))
                                    <p class="text-danger">{{ $errors->first('warranty_months') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="weight">Weight (kg):</label>
                                    <input type="number" step="0.01" class="form-control" id="weight" name="weight">
                                </div>
                                @if ($errors->has('weight'))
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="dimensions">Dimensions:</label>
                                    <input type="text" class="form-control" id="dimensions" name="dimensions">
                                </div>
                                @if ($errors->has('dimensions'))
                                    <p class="text-danger">{{ $errors->first('dimensions') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                    <small class="form-text text-muted">Upload an image for the product.</small>
                                </div>
                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Create Product</button>
                                    <a href="{{ route('product') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function generateProductCode() {
                return 'PROD-' + Math.random().toString(36).substr(2, 9).toUpperCase();
            }

            document.getElementById('code').value = generateProductCode();
        });
    </script>
@endsection
