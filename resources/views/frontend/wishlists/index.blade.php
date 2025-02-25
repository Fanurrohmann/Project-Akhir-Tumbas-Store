@extends('frontend.layout')

@section('content')
	<div class="breadcrumb-area pt-100 breadcrumb-padding pb-100" style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/breadcrumb3.jpg') }})">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Wishlist Saya</h2>
				<ul>
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>Wishlist</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
                    @include('frontend.partials.user_menu')
				</div>
				<div class="col-lg-9">
                @if(session()->has('message'))
                    <div class="content-header mb-3 pb-0">
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
					<div class="shop-product-wrapper res-xl shadow -sm">
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th><b>Hapus</b></th>
										<th><b>Image</b></th>
										<th><b>Produk</b></th>
										<th><b>Harga</b></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($wishlists as $wishlist)
										@php
											$product = $wishlist->product;
											$product = isset($product->parent) ?: $product;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/TumbasStore/assets/img/cart/3.jpg')
										@endphp
										<tr>
											<td class="product-remove">
                                            <form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="post" class="delete d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="background-color: red; border-color: #FFF; color: white; font-weight: bold;">X</button>
                                            </form>
											</td>
											<td class="product-thumbnail">
												<a href="{{ url('product/'. $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px"></a>
											</td>
											<td class="product-name"><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></td>
											<td class="product-price-cart"><span class="amount">Rp. {{ number_format($product->priceLabel(), 0, ",", ".") }}</span></td>
										</tr>
									@empty
										<tr>
											<td colspan="4">Anda tidak memiliki produk daftar keinginan</td>
										</tr>
									@endforelse
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
