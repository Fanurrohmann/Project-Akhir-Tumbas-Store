@extends('frontend.layout')

@section('content')
	<div class="breadcrumb-area pt-100 breadcrumb-padding pb-100" style="background-image: url({{ asset('themes/TumbasStore/assets/img/bg/profile2.svg') }})">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Pesanan Saya</h2>
				<ul>
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>Pesanan Saya</li>
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
					<div class="shop-product-wrapper res-xl shadow-lg">
						<div class="table-content table-responsive">
							<table class="table table-striped">
								<thead>
									<th><b>ID Pesanan</b></th>
									<th><b>Jumlah keseluruhan</b></th>
									<th><b>Nomer Resi</b></th>
									<th><b>Status</b></th>
									<th><b>Pembayaran</b></th>
									<th><b>Action</b></th>
								</thead>
								<tbody>
									@forelse($orders as $order)
										<tr>
											<td>
												{{ $order->code }}<br>
												<span style="font-size: 12px; font-weight: normal"> {{ date('d M Y', strtotime($order->order_date)) }}</span>
											</td>
											<td>Rp. {{ number_format($order->grand_total, 0, ",", ".") }}</td>
											<td>{{ $order->shipment->track_number }}</td>
											<td>
												@php
													$statusClass = match($order->status) {
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
											</td>
											<td>
												@php
													$paymentClass = match($order->payment_status) {
														'paid' => 'badge-paid',
														'unpaid' => 'badge-unpaid',
														default => 'badge-other',
													};
												@endphp
												<span class="badge {{ $paymentClass }}">{{ ucfirst($order->payment_status) }}</span>
											</td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center" style="gap: 5px;">
                                                    <!-- Tampilkan kedua ikon jika status 'created' atau 'unpaid' -->
                                                    @if (in_array($order->status, ['created', 'unpaid']))
                                                        <!-- Icon Show -->
                                                        <a href="{{ url('orders/' . $order->id) }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center px-2 py-1" title="Show" style="font-size: 14px; margin-right: 10px;">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                        <!-- Icon Pembayaran -->
                                                        <a href="{{ url('orders/received/' . $order->id) }}" class="btn btn-sm btn-success d-flex align-items-center justify-content-center px-2 py-1" title="Pembayaran" style="font-size: 14px;">
                                                            <i class="pe-7s-cash"></i>
                                                        </a>
                                                    @elseif (in_array($order->status, ['delivered', 'confirmed', 'completed', 'cancelled']))
                                                        <!-- Tampilkan hanya ikon Show -->
                                                        <a href="{{ url('orders/' . $order->id) }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center px-2 py-1" title="Show" style="font-size: 14px;">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
										</tr>
									@empty
										<tr>
											<td colspan="6">No records found</td>
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
