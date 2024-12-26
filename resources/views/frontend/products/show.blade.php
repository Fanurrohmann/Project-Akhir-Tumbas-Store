@extends('frontend.layout')

@section('content')
    <div class="breadcrumb-area pt-100 pb-100"
        style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/bg3.svg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Detail Produk</h2>
                <ul>
                    <li><a href="/">home</a></li>
                    <li><a href="/products">shop grid 3 column</a></li>
                    <li> Detail Produk </li>
                </ul>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="content-header mb-0 pb-0 mt-3">
            <div class="container-fluid">
                <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    @endif
    <div class="product-details ptb-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-70">
                            <div class="product-details-large tab-content">
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($product->productImages as $image)
                                    <div class="tab-pane fade {{ $i == 1 ? 'active show' : '' }}"
                                        id="pro-details{{ $i }}" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            @if ($image->path)
                                                <a href="{{ asset('storage/' . $image->path) }}">
                                                    <img src="{{ asset('storage/' . $image->path) }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            @else
                                                <a href="{{ asset('themes/TumbasStore/assets/img/product-details/bl1.jpg') }}">
                                                    <img src="{{ asset('themes/TumbasStore/assets/img/product-details/l1.jpg') }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @empty
                                    No image found!
                                @endforelse
                            </div>
                            <div class="product-details-small nav mt-12" role=tablist>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($product->productImages as $image)
                                    <a style="width: 100px;" class="{{ $i == 1 ? 'active' : '' }} mr-12"
                                        href="#pro-details{{ $i }}" data-toggle="tab" role="tab"
                                        aria-selected="true">
                                        @if ($image->path)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('themes/TumbasStore/assets/img/product-details/s1.jpg') }}"
                                                alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                    @php
                                        $i++;
                                    @endphp
                                @empty
                                    No image found!
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3>{{ $product->name }}</h3>
                        <div class="details-price">
                            <span>Rp. {{ number_format($product->priceLabel(), 0, ',', '.') }}</span>
                        </div>
                        <p>{{ $product->short_description }}</p>
                        <form action="{{ route('carts.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if ($product->type == 'configurable')
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select name="size" class="select" id="">
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-option-part">
                                        <label>Color*</label>
                                        <select name="color" class="select" id="">
                                            @foreach ($colors as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="quickview-plus-minus d-flex align-items-center">
                                <div class="cart-plus-minus">
                                    <input type="number" name="qty" value="1" class="cart-plus-minus-box"
                                        min="1">
                                </div>
                                <div class="quickview-btn-cart ml-2">
                                    <button type="submit" class="btn btn-primary btn-uniform">Add to Cart</button>
                                </div>
                                <div class="quickview-btn-cart ml-2">
                                    <button type="submit" class="btn btn-success btn-uniform"
                                        formaction="{{ route('carts.shopNow') }}">Shop Now</button>
                                </div>
                                <div class="quickview-btn-wishlist ml-2">
                                    <a class="btn btn-outline-secondary btn-uniform" href="#"><i
                                            class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </form>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                @foreach ($product->categories as $category)
                                    <li><a
                                            href="{{ url('products/category/' . $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-details-cati-tag mtb-10">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                <li><a href="#">Pakaian</a></li>
                                <li><a href="#">Makanan</a></li>
                                <li><a href="#">Minuman</a></li>
                                <li><a href="#">Kerjianan</a></li>
                                <li><a href="#">Aksesoris</a></li>
                            </ul>
                        </div>
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Check out this product: ' . Request::fullUrl()) }}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.tiktok.com/share/item?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=Check%20this%20out!" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review text-center">
                <div class="description-review-title nav" role=tablist>
                    <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Deskripsi
                    </a>
                    <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Reviews (0)
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                        <p>{{ $product->description }} </p>
                    </div>
                    <div class="tab-pane fade" id="pro-review" role="tabpanel">
                        <a href="#">Jadilah yang pertama menulis ulasan Anda!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
