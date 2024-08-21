@extends('layouts.header')

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">

    </section>


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Kirim Kami Pesan
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone"
                                placeholder="Nomor Telepon Anda">
                            <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                                placeholder="Bagaimana Kami Dapat Membantu Anda?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Kirim
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Alamat
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Jl. Labuan No.3 01/04, Kebonwaru, Kec. Batununggal, Kota Bandung, Jawa Barat 40272
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Nomor Telepon
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                <a href="https://api.whatsapp.com/send?phone=6283820352292" target="_blank"
                                    class="cl1 hov-cl2">
                                    0838-2035-2292
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Email
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                <a href="mailto:radhifarizka25062001@gmail.com" class="cl1 hov-cl2">
                                    radhifarizka25062001@gmail.com
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var phoneInput = document.querySelector('input[name="phone"]');
                var msgTextarea = document.querySelector('textarea[name="msg"]');

                var pesan = encodeURIComponent('Pertanyaan dari ' + phoneInput.value + ': ' + msgTextarea
                    .value);

                var nomorWhatsApp = '6283195702343';

                var linkWhatsApp = 'https://api.whatsapp.com/send?phone=' + nomorWhatsApp + '&text=' +
                    pesan;

                window.open(linkWhatsApp, '_blank');
            });
        });
    </script>
@endsection
