@extends('frontend.layout')

@section('content')
    <!-- Header End -->
    <div class="breadcrumb-area pt-100 breadcrumb-padding pb-100"
        style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/breadcrumb3.jpg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Tentang Kami</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- About Us Section Start -->
    <div class="about-us-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center" style="min-height: 100%;">
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-img" style="max-width: 600px; margin: 0 auto;">
                        <img src="{{ asset('themes/TumbasStore/assets/img/about/about-us.jpg') }}" alt="Tentang Kami">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-content" style="display: flex; flex-direction: column; justify-content: flex-start;">
                        <h3><b>Selamat Datang di Tumbas Store</b></h3>
                        <p>
                            Tumbas Store adalah toko online terpercaya yang menghadirkan produk-produk lokal berkualitas,
                            mulai dari fashion, makanan, hingga perlengkapan rumah. Kami bangga menjadi bagian dari
                            masyarakat Indonesia dengan menawarkan produk yang mencerminkan nilai budaya dan kebutuhan
                            sehari-hari Anda.
                        </p>
                        <p>
                            Dengan komitmen terhadap kualitas dan pelayanan terbaik, kami berusaha memberikan pengalaman
                            belanja yang nyaman dan memuaskan. Berbelanja di Tumbas Store berarti mendukung produk lokal
                            dan turut membangun ekonomi kreatif Indonesia.
                        </p>
                        <ul>
                            <li><i class="fa fa-check"></i> Produk berkualitas dan terjamin.</li>
                            <li><i class="fa fa-check"></i> Harga terjangkau untuk semua kalangan.</li>
                            <li><i class="fa fa-check"></i> Pelayanan yang ramah dan cepat.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Vision and Mission Section Start -->
    <div class="vision-mission-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="vision-content">
                        <h4>Visi Kami</h4>
                        <p>
                            Menjadi toko online pilihan utama yang mengedepankan produk lokal berkualitas
                            dengan pelayanan yang unggul.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-content">
                        <h4>Misi Kami</h4>
                        <ul>
                            <li><i class="fa fa-star"></i> Mendukung pertumbuhan produk lokal Indonesia.</li>
                            <li><i class="fa fa-star"></i> Memberikan pengalaman belanja yang mudah dan aman.</li>
                            <li><i class="fa fa-star"></i> Berkontribusi dalam meningkatkan perekonomian kreatif.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision and Mission Section End -->

    <!-- Team Section Start -->
    <div class="team-area pt-120 pb-120">
        <div class="container">
            <div class="section-title text-center">
                <h2>Tim Kami</h2>
                <p>Kami terdiri dari tim profesional yang berdedikasi untuk memberikan layanan terbaik bagi Anda.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <img src="{{ asset('themes/TumbasStore/assets/img/team/team1.png') }}" alt="Team Member">
                        </div>
                        <div class="team-content">
                            <h4>M Alfa Nur Rohman</h4>
                            <span>CEO</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <img src="{{ asset('themes/TumbasStore/assets/img/team/team1.png') }}" alt="Team Member">
                        </div>
                        <div class="team-content">
                            <h4>M Alfa Nur Rohman</h4>
                            <span>Marketing Manager</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <img src="{{ asset('themes/TumbasStore/assets/img/team/team1.png') }}" alt="Team Member">
                        </div>
                        <div class="team-content">
                            <h4>M Alfa Nur Rohman</h4>
                            <span>Customer Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->
@endsection
