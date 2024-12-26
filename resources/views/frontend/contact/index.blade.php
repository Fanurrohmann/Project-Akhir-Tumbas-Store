@extends('frontend.layout')

@section('content')
    <!-- header end -->
    <div class="breadcrumb-area pt-100 breadcrumb-padding pb-100"
        style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/breadcrumb3.jpg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Hubungi Kami</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Hubungi Kami</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-us-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Live Chat Section -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="contact-info-wrapper p-4 d-flex align-items-stretch justify-content-between">
                        <div>
                            <h3 class="font-weight-bold mb-2">Live Chat</h3>
                            <p class="mb-0 text-muted">Melayani pada pukul 08:00 - 17:00 WIB</p>
                        </div>
                        <a href="https://wa.me/6288238365649" class="btn btn-success btn-lg d-flex align-items-center justify-content-center">
                            <i class="fas fa-comments"></i> Chat Sekarang
                        </a>
                    </div>
                </div>
                <!-- Email Section -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="contact-info-wrapper p-4 d-flex align-items-stretch justify-content-between">
                        <div>
                            <h3 class="font-weight-bold mb-2">Email</h3>
                            <p class="mb-1">
                                Alamat email: <a href="mailto:customercare@gramedia.id"
                                    class="text-decoration-none">alfarohman160@gmail.com</a>
                            </p>
                            <p class="mb-0 text-muted">Melayani pada pukul 08:00 - 17:00 WIB</p>
                        </div>
                        <a href="mailto:alfarohman160@gmail.com?subject=Hubungi%20Kami&body=Silakan%20tulis%20pesan%20Anda%20di%20sini."
                            class="btn btn-primary btn-lg d-flex align-items-center justify-content-center">
                            <i class="fas fa-envelope"></i> Kirim Email
                        </a>
                    </div>
                </div>
            </div>
            <!-- OpenStreetMap Embed -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="font-weight-bold mb-2">Lokasi Kami</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d771.7376576374674!2d111.03297326948152!3d-6.456641999595927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjcnMjMuOSJTIDExMcKwMDInMDEuMCJF!5e1!3m2!1sid!2sid!4v1734025035526!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
