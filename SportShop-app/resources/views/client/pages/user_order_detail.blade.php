@section('title')
    Bill detail
@endsection
@extends('client.layouts.master')
<style>
	.disabled {
		pointer-events: none;
		cursor: default;
		opacity: 0.6;
	}
</style>
@section('content')
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Bill detail
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="{{route('user.cancel.detail.history.order',[$orders->id])}}" method="POST" onsubmit="return confirm('Are you sure?')">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-2">Size</th>
									<th class="column-2">Color</th>
									<th class="column-2">Price</th>
									<th class="column-2">Quantity</th>
									<th class="column-2">Total</th>
								</tr>
								@foreach ($orderItems as $orderItem)
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="{{asset("images/$orderItem->proImage")}}" alt="{{$orderItem->proName}}">
											</div>
										</td>
										<td class="column-2">{{$orderItem->proName}}</td>
										<td class="column-2">{{$orderItem->proSize}}</td>
										<td class="column-2">{{$orderItem->proColor}}</td>
										<td class="column-2">{{number_format($orderItem->price, 0, ',', '.') }}</td>
                                        <td class="column-2">{{$orderItem->quantity}}</td>
										<td class="column-2 shoping__cart__total">
											<div class="child_shoping__cart__total">
												{{number_format($orderItem->price * $orderItem->quantity, 0, ',', '.') }}
											</div>
										</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>

				</div>


				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Information:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Name
									</span>
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<input disabled class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name" value="{{$orders->name}}">
									</div>

									<span class="stext-112 cl8">
										Email
									</span>
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<input disabled class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" id="email" name="email" placeholder="Email" value="{{$orders->email}}">
									</div>

									<span class="stext-112 cl8">
										Phone number
									</span>
									<div class="bor8 bg0 m-b-12">
										<input disabled  class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" id="phone" name="phone" placeholder="Phone" value="{{$orders->phone}}">
									</div>

									<span class="stext-112 cl8">
										Address
									</span>
									<div class="bor8 bg0 m-b-22">
										<input disabled  class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" id="address" name="address" placeholder="Address" value="{{$orders->address}}">
									</div>

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">

							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1 total1">
								<div class="total2">
									<span id="total_cart" class="mtext-110 cl2">
										{{number_format($orders->total_balance, 0, ',', '.') }}
									</span>
								</div>
							</div>
						</div>

						<button class="{{$orders->status === 'cancel' || $orders->status === 'pending' || $orders->status === 'done' ? 'disabled' : ''}} flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							@if($orders->status === 'cancel' || $orders->status === 'done')
								Go to shop
							@elseif($orders->status === 'pending')
								Pending
							@else
								Cancel bill
							@endif
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection

