@extends('client.layouts.master')

@section('title')
    Order
@endsection

@section('content')
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
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
								@foreach ($order->order_items as $item)
									<tr class="table_row" >
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="{{asset("images/").'/'.$item['image']}}" alt="{{$item['name']}}">
											</div>	
										</td>
										<td class="column-2">{{$item['name']}}</td>
										<td class="column-2">{{$item['size']}}</td>
										<td class="column-2">{{$item['color']}}</td>
										<td class="column-2">${{$item['price']}}</td>
										<td class="column-2">
											{{$item['qty']}}
										<td class="column-2 shoping__cart__total">
											<div class="child_shoping__cart__total">
												${{ number_format($item['qty'] * $item['price'], 2) }}
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

						<div class="flex-w flex-t p-t-27 p-b-33">
                            @php
                                $total = 0;
                                foreach ($order->order_items as $item) {
                                    $total += $item['price'] * $item['qty'];
                                }
                            @endphp
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1 total1">
								<div class="total2">
									<span id="total_cart" class="mtext-110 cl2">
										${{ number_format($total, 2) }}
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection
