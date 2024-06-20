@extends('layouts.header')

@section('content')
    <!-- Slider -->
    <style>
        .status-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            overflow: auto;
        }

        .status-item {
            min-width: 100px;
            height: 40px;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 8px 16px;
            border-radius: 20px;
            margin-right: 10px;
            font-weight: bold;
            color: #666;
            cursor: pointer;
            transition: background-color 0.3s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .status-item:last-child {
            margin-right: 0;
        }

        .status-selected {
            color: #fff;
            background-color: #222222;
        }

        .status-item:hover {
            background-color: #eee;
        }
    </style>
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl0 respon2">
                                    Keunggulan Kami sebagai Kontraktor
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl0 p-t-19 p-b-43 respon1">
                                    Pelayanan Profesional
                                </h2>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl0 respon2">
                                    Keunggulan Kami sebagai Kontraktor
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl0 p-t-19 p-b-43 respon1">
                                    Peralatan Berkualitas Tinggi
                                </h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Produk Kami
                </h3>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="/assets/products/{{ $product->image_url }}" alt="IMG-PRODUCT">
                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                    style="margin: auto; text-align: center;" data-toggle="modal" data-target="#orderModal"
                                    data-id="{{ $product->id }}" data-nama="{{ $product->name }}"
                                    data-harga="{{ $product->price }}" data-category="{{ $product->category }}"
                                    data-description="{{ $product->description }}" data-stock="{{ $product->stock }}"
                                    data-manufacturer="{{ $product->manufacturer }}"
                                    data-model-number="{{ $product->model_number }}"
                                    data-warranty="{{ $product->warranty_months }}" data-weight="{{ $product->weight }}"
                                    data-dimensions="{{ $product->dimensions }}">
                                    Pesan Sekarang
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp {{ number_format($product->price, 0, ',', '.') }} / Bulan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Order Modal -->
        <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
            aria-hidden="true" style="top: 10%;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="orderForm" method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <input type="hidden" name="product_id" id="product-id">

                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel">Pesan Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product-details">Detail Produk</label>
                                <div id="product-details">
                                    <p><strong>Nama Produk:</strong> <span id="product-name"></span></p>
                                    <p><strong>Harga:</strong> <span id="product-price"></span>/Bulan</p>
                                    <p><strong>Kategori:</strong> <span id="product-category"></span></p>
                                    <p><strong>Deskripsi:</strong> <span id="product-description"></span></p>
                                    <p><strong>Stok:</strong> <span id="product-stock"></span></p>
                                    <p><strong>Manufaktur:</strong> <span id="product-manufacturer"></span></p>
                                    <p><strong>Nomor Model:</strong> <span id="product-model-number"></span></p>
                                    <p><strong>Garansi:</strong> <span id="product-warranty"></span> bulan</p>
                                    <p><strong>Berat:</strong> <span id="product-weight"></span> kg</p>
                                    <p><strong>Dimensi:</strong> <span id="product-dimensions"></span></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer-name">Nama</label>
                                <input type="text" class="form-control" id="customer-name" name="customer_name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="customer-email">Email</label>
                                <input type="email" class="form-control" id="customer-email" name="customer_email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="customer-phone">No. Telepon</label>
                                <input type="text" class="form-control" id="customer-phone" name="customer_phone"
                                    required>
                            </div>
                            <div class="status-bar">
                                <div class="status-item status-selected" data-value="3">3 Bulan</div>
                                <div class="status-item" data-value="6">6 Bulan</div>
                                <div class="status-item" data-value="12">1 Tahun</div>
                                <input type="hidden" name="months_rented" id="days-rented" value="3">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            var successMessage = '{{ session('success') }}';
            var errorMessage = '{{ session('error') }}';
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: successMessage,
                    showConfirmButton: false,
                    timer: 2000
                });
            }

            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMessage,
                    showConfirmButton: false,
                    timer: 2000
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                var orderButtons = document.querySelectorAll('.block2-btn');

                orderButtons.forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();

                        var productId = button.getAttribute('data-id');
                        var productName = button.getAttribute('data-nama');
                        var productPrice = button.getAttribute('data-harga');
                        var productCategory = button.getAttribute('data-category');
                        var productDescription = button.getAttribute('data-description');
                        var productStock = button.getAttribute('data-stock');
                        var productManufacturer = button.getAttribute('data-manufacturer');
                        var productModelNumber = button.getAttribute('data-model-number');
                        var productWarranty = button.getAttribute('data-warranty');
                        var productWeight = button.getAttribute('data-weight');
                        var productDimensions = button.getAttribute('data-dimensions');

                        var productIdInput = document.getElementById('product-id');
                        productIdInput.value = productId;

                        document.getElementById('product-name').textContent = productName;
                        document.getElementById('product-price').textContent = 'Rp ' + Number(
                            productPrice).toLocaleString();
                        document.getElementById('product-category').textContent = productCategory;
                        document.getElementById('product-description').textContent = productDescription;
                        document.getElementById('product-stock').textContent = productStock;
                        document.getElementById('product-manufacturer').textContent =
                            productManufacturer;
                        document.getElementById('product-model-number').textContent =
                            productModelNumber || 'N/A';
                        document.getElementById('product-warranty').textContent = productWarranty;
                        document.getElementById('product-weight').textContent = productWeight || 'N/A';
                        document.getElementById('product-dimensions').textContent = productDimensions ||
                            'N/A';

                        $('#orderModal').modal('show');
                    });
                });

                var statusItems = document.querySelectorAll('.status-item');
                var selectedDurationInput = document.getElementById('days-rented');

                statusItems.forEach(function(item) {
                    item.addEventListener('click', function() {
                        statusItems.forEach(function(el) {
                            el.classList.remove('status-selected');
                        });
                        item.classList.add('status-selected');

                        var selectedValue = item.getAttribute('data-value');
                        selectedDurationInput.value = selectedValue;
                    });
                });
            });
        </script>
    </section>
@endsection
