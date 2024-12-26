@extends('frontend.layout')

@section('content')
	<!-- header end -->
	<div class="breadcrumb-area pt-100 breadcrumb-padding pb-100" style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/breadcrumb3.jpg') }})">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>order process</h2>
				<ul>
					<li><a href="{{ url('/') }}">home</a></li>
                    <li><a href="{{ url('/orders') }}">Pesanan Saya</a></li>
					<li>order process</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- checkout-area start -->
	<div class="cart-main-area  ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if(session()->has('message'))
                    <div class="content-header mb-0 pb-0">
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
					<h1 class="cart-heading">Pesanan Anda :</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Penagihan</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Telefon: {{ $order->customer_phone }}
								<br> KodePOS: {{ $order->customer_postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Pengiriman</p>
							<address>
								{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
								<br> {{ $order->shipment->address1 }}
								<br> {{ $order->shipment->address2 }}
								<br> Email: {{ $order->shipment->email }}
								<br> Telefon: {{ $order->shipment->phone }}
								<br> KodePOS: {{ $order->shipment->postcode }}
							</address>
						</div>
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail</p>
                            <address>
                                Invoice ID:
                                <span class="text-dark">#{{ $order->code }}</span>
                                <br> {{ $order->order_date }}
                                <br> Status:
                                @php
                                    $statusClass = match($order->status) {
                                        'paid' => 'badge-paid',
                                        'unpaid' => 'badge-unpaid',
                                        'created' => 'badge-created',
                                        'confirmed' => 'badge-confirmed',
                                        'completed' => 'badge-completed',
                                        default => 'badge-other',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                                <br> Status Pembayaran:
                                @php
                                    $paymentClass = match($order->payment_status) {
                                        'paid' => 'badge-paid',
                                        'unpaid' => 'badge-unpaid',
                                        default => 'badge-other',
                                    };
                                @endphp
                                <span class="badge {{ $paymentClass }}">{{ ucfirst($order->payment_status) }}</span>
                                <br> Dikirim Oleh: {{ $order->shipping_service_name }}
                            </address>
                        </div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Deskripsi</th>
									<th>Jumlah</th>
									<th>Harga Satuan</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@php
									function showAttributes($jsonAttributes)
									{
										$jsonAttr = (string) $jsonAttributes;
										$attributes = json_decode($jsonAttr, true);
										$showAttributes = '';
										if ($attributes) {
											$showAttributes .= '<ul class="item-attributes list-unstyled">';
											foreach ($attributes as $key => $attribute) {
												if(count($attribute) != 0){
													foreach($attribute as $value => $attr){
														$showAttributes .= '<li>'.$value . ': <span>' . $attr . '</span><li>';
													}
												}else {
													$showAttributes .= '<li><span> - </span></li>';
												}
											}
											$showAttributes .= '</ul>';
										}
										return $showAttributes;
									}
								@endphp
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<td>{!! showAttributes($item->attributes) !!}</td>
										<td>{{ $item->qty }}</td>
										<td>Rp. {{ number_format($item->base_price,0,",",".") }}</td>
										<td>Rp. {{ number_format($item->sub_total,0,",",".") }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
                    <div class="row mt-3">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <ul>
                                    <li>Subtotal <span>Rp{{ number_format($order->base_total_price, 0, ',', '.') }}</span></li>
                                    <li>Tax (10%) <span>Rp{{ number_format($order->tax_amount, 0, ',', '.') }}</span></li>
                                    <li>Biaya Pengiriman <span>Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</span></li>
                                    <li>Total <span>Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span></li>
                                </ul>

                                <!-- Membuat tombol vertikal dengan jarak antar tombol -->
                                <div class="d-flex flex-column gap-3 mt-4">
                                    <!-- Tombol Lanjutkan ke Pembayaran -->
                                    <a href="{{ $order->payment_url }}" class="btn btn-success px-5 py-4 rounded-pill d-flex align-items-center justify-content-center w-100 mb-3">
                                        <i class="fas fa-credit-card mr-2"></i> Lanjutkan ke Pembayaran
                                    </a>

                                    @if (in_array($order->status, ['created', 'unpaid']))
                                        <!-- Tombol Batalkan Pesanan -->
                                        <form action="{{ route('frontend.orders.cancel', $order) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');" class="w-100">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger px-5 py-4 rounded-pill d-flex align-items-center justify-content-center w-100 mb-3">
                                                <i class="fas fa-times-circle mr-2"></i> Batalkan Pesanan
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection
