@extends('frontend.layout')

@section('content')
    <!-- slider -->
    <div class="container mt-4">
        <div class="row">
            <!-- Carousel Kiri -->
            <div class="col-lg-9 col-md-12">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        @foreach ($slides as $slide)
                            <div class="single-slider-4" style="background-image: url('{{ Storage::url($slide->path) }}');">
                                <div class="container">
                                    <div class="row">
                                        <div class="ml-auto col-lg-6">
                                            <div class="furniture-content fadeinup-animated">
                                                <h2 class="animated">{{ $slide->title }}</h2>
                                                <p class="animated">{{ $slide->body }}</p>
                                                <a class="furniture-slider-btn btn-hover animated"
                                                    href="{{ $slide->url }}">Go</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Dua gambar vertikal di kanan -->
            <div class="col-lg-3 col-md-12 d-flex flex-column">
                <div class="mb-3">
                    <img src="{{ asset('themes/TumbasStore/assets/img/banner/gambar1.jpg') }}" alt="Gambar Promo 1"
                        class="img-fluid rounded shadow">
                </div>
                <div>
                    <img src="{{ asset('themes/TumbasStore/assets/img/banner/gambar2.jpg') }}" alt="Gambar Promo 2"
                        class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- products -->
    @if ($products)
        <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
            <div class="container-fluid">
                <div class="section-title-6 text-center mb-50">
                    <h2>Produk Populer</h2>
                    <p>Produk Populer adalah barang atau layanan yang paling diminati oleh pelanggan dalam suatu toko
                        atau platform penjualan. Produk ini biasanya memiliki permintaan tinggi karena kualitasnya,
                        fungsionalitas, tren pasar, atau ulasan positif dari pelanggan. Di Tumbas Store, produk populer
                        mencerminkan kebutuhan dan selera konsumen</p>
                </div>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        @foreach ($products as $product)
                            @php
                                $product = $product->parent ?: $product;
                            @endphp
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{ url('product/' . $product->slug) }}">
                                        @if ($product->productImages->first())
                                            <img src="{{ Storage::url($product->productImages->first()->path) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('themes/TumbasStore/assets/img/product/fashion-colorful/1.jpg') }}"
                                                alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-left add-to-fav" title="Wishlist"
                                            product-slug="{{ $product->slug }}" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-top add-to-card" title="Add To Cart" href=""
                                            product-id="{{ $product->id }}" product-type="{{ $product->type }}"
                                            product-slug="{{ $product->slug }}">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-right quick-view" title="Quick View"
                                            product-slug="{{ $product->slug }}" href="">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a></h4>
                                    <span>Rp{{ number_format($product->priceLabel(), 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <!-- product area end -->
    @endif
    <!-- end -->
@endsection
