@extends('layouts.header')

@section('content')
<!-- Slider -->
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
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="/assets/products/{{ $product->image_url }}" alt="IMG-PRODUCT">
                    
                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                            data-nama="{{ $product->name }}"
                            data-harga="{{ $product->price }}">
                            Pesan Sekarang
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </a>

                            <span class="stext-105 cl3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var pesanButtons = document.querySelectorAll('.block2-btn');
    
            pesanButtons.forEach(function (pesanButton) {
                pesanButton.addEventListener('click', function (event) {
                    event.preventDefault();
    
                    var namaProduk = pesanButton.getAttribute('data-nama');
                    var hargaProduk = parseFloat(pesanButton.getAttribute('data-harga'));

                    var formattedHarga = 'Rp ' + hargaProduk.toLocaleString('id-ID');
    
                    var pesan = encodeURIComponent('Saya tertarik dengan ' + namaProduk + ' seharga ' + formattedHarga);
    
                    var nomorWhatsApp = '6283195702343';
    
                    pesanButton.href = 'https://api.whatsapp.com/send?phone=' + nomorWhatsApp + '&text=' + pesan;
    
                    window.open(pesanButton.href, '_blank');
                });
            });
        });
    </script>
    
</section>
@endsection
    