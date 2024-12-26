@extends('frontend.layout')

@section('content')
	<div class="breadcrumb-area pt-100 breadcrumb-padding pb-100" style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/breadcrumb3.jpg') }})">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Show My Order</h2>
				<ul>
					<li><a href="{{ url('/') }}">home</a></li>
					<li><a href="{{ url('/orders') }}">pesanan saya</a></li>
					<li>show order</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<!--<div class="col-lg-3">-->
				<!--	@include('frontend.partials.user_menu')-->
				<!--</div>-->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="d-flex justify-content-between">
						<h2 class="text-dark font-weight-medium">Order ID #{{ $order->code }}</h2>
					</div>
					<div class="row pt-5">
						<div class="col-xl-4 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Penagihan</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Telepon: {{ $order->customer_phone }}
								<br> KodePOS: {{ $order->customer_postcode }}
							</address>
						</div>
						@if ($order->shipment)
							<div class="col-xl-4 col-lg-4">
								<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Pengiriman</p>
								<address>
									{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
									<br> {{ $order->shipment->address1 }}
									<br> {{ $order->shipment->address2 }}
									<br> Email: {{ $order->shipment->email }}
									<br> Telepon: {{ $order->shipment->phone }}
									<br> KodePOS: {{ $order->shipment->postcode }}
								</address>
							</div>
						@endif
						<div class="col-xl-4 col-lg-4">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail</p>
                            <address>
                                Invoice ID:
                                <span class="text-dark">#{{ $order->code }}</span>
                                <br> {{ $order->order_date }}
                                <br> Status:
                                @php
                                    $statusClass = match ($order->status) {
                                        'paid' => 'badge-paid',
                                        'unpaid' => 'badge-unpaid',
                                        'created' => 'badge-created',
                                        'confirmed' => 'badge-confirmed',
                                        'completed' => 'badge-completed',
                                        'cancelled' => 'badge-cancelled',
                                        default => 'badge-other',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                                {{ $order->isCancelled() ? '(' . $order->cancelled_at . ')' : null }}
                                    @if ($order->isCancelled())
                                        <br>
                                        <span class="badge badge-cancel-note">
                                            <b>Cancellation Note:</b> {{ $order->cancellation_note }}
                                        </span>
                                    @endif
                                <br> Status Pembayaran:
                                @php
                                    $paymentClass = match ($order->payment_status) {
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
						<table class="table table-bordered table-striped">
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
											$showAttributes .= '<ul class="item-attributes">';
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
										<td>Rp. {{ number_format($item->base_price, 0, ",", ".") }}</td>
										<td>Rp. {{ number_format($item->sub_total, 0, ",", ".") }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
                    @if (in_array($order->status, ['paid', 'confirmed', 'delivered', 'completed']))
                        <div class="d-flex justify-content-end mt-4">
                            @if ($order->status === 'completed')
                                <div class="d-flex flex-column align-items-end" style="width: 250px;">
                                    <button class="btn btn-secondary px-5 py-4 fs-1 rounded-pill d-flex align-items-center justify-content-center w-100 fw-bold mb-3" disabled>
                                        <i class="pe-7s-check fa-2x"></i> Pesanan Sudah Sampai
                                    </button>
                                    <a href="https://wa.me/{{ $adminPhoneNumber = '6288238365649' }}?text=Halo%20Admin,%20saya%20ingin%20mengajukan%20komplain%20untuk%20pesanan%20dengan%20ID%20{{ $order->code }}"
                                        target="_blank" class="btn btn-warning px-5 py-4 fs-1 rounded-pill d-flex align-items-center justify-content-center w-100 fw-bold mb-3">
                                        <i class="pe-7s-help1 fa-2x"></i> Ajukan Komplain
                                    </a>
                                </div>
                            @else
                                <form action="{{ url('orders/mark-as-received/' . $order->id) }}" method="POST" style="width: 250px;">
                                    @csrf
                                    <button type="submit" class="btn btn-success px-5 py-4 fs-1 rounded-pill d-flex align-items-center justify-content-center w-100 fw-bold mb-3">
                                        <i class="pe-7s-check fa-2x"></i> Pesanan Sudah Sampai
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
				</div>
			</div>
		</div>
	</div>
@endsection
