@section('title')
    Shoping Cart
@endsection
@extends('client.layouts.master')

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
									<th class="column-5">Quantity</th>
									<th class="column-2">Total</th>
								</tr>
								@foreach ($cart as $id => $item)
									<tr class="table_row" id="product{{$id}}">

										<td class="column-1">
											<div data-id="{{ $id }}" data-url="{{ route('cart.delete-product-in-cart', ['id' => $id]) }}" class="how-itemcart1 icon_close">
												<img src="{{asset("images/").'/'.$item['image']}}" alt="{{$item['name']}}">
											</div>
										</td>
										<td class="column-2">{{$item['name']}}</td>
										<td class="column-2">{{$item['size']}}</td>
										<td class="column-2">{{$item['color']}}</td>
										<td class="column-2">{{number_format($item['price'], 0, ',', '.') }}</td>

										<input class="stock" style="display: none" type="text" value="{{$item['product_stock']}}">

										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input disabled data-url="{{ route('cart.update-product-in-cart', ['id' => $id]) }}" data-id="{{ $id }}" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$item['qty']}}">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
													<input style="display: none" type="number" class="stock_item" value="{{$item['product_stock']}}">
												</div>
											</div>
										</td>
										<td class="column-5 shoping__cart__total">
											<div class="child_shoping__cart__total">
												{{number_format($item['qty'] * $item['price'], 0, ',', '.') }}
											</div>
										</td>
									</tr>
								@endforeach

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<a href="{{route('shop')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</a>
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
								foreach ($cart as $item) {
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
										<input class="total_input" style="display: none" type="text" value="{{$total}}">
										{{number_format($total, 0, ',', '.') }} vnd
									</span>
								</div>
							</div>
						</div>

						<a class="place-order-btn flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{ $total > 0 ? route('checkout') : route('shop')}}">{{ $total > 0 ? 'Proceed to Checkout' : 'Go to shop'}}</a>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection

@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('div.icon_close').on('click', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');
                var selectorTr = '#product' + id;
                var urlCart = "{{ route('cart.cart') }}" + ' .total2';

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(res) {
                        // swal("Xoa san pham thang thanh cong ^^!", "", "success");
                        $(selectorTr).empty();
                        $(".total1").load(urlCart);
                        $('#total_cart').html(res.total_cart);
                    }
                });
            });

			$('.place-order-btn').on('click', function(event){
				var $total_cart_btn = $('.total_input').val()
				if($total_cart_btn == 0){
					swal("Please choose product!","", "warning");	
					event.preventDefault();
					return;
				}
			})


			$('.btn-num-product-down, .btn-num-product-up').on('click', function(event){
				var $button = $(this);



				var isIncrement = $button.hasClass('btn-num-product-up');
				var numProduct = $button.parent().find('input').val();

				var stock = parseInt($button.find('.stock_item').val());

				if (isIncrement) {

					if (numProduct = stock) {
						swal("The quantity ordered exceeds the available stock. Please adjust the quantity !","", "warning");
						var newVal = parseFloat(numProduct);
                        $button.hide();
					}else{
						var newVal = parseFloat(numProduct);
					}

				} else {
                    $('.btn-num-product-up').show();
					if (numProduct > 0) {
						var newVal = parseFloat(numProduct);
					}else {
                        newVal = 0;
                    }
				}

				// $button.parent().find('input').val(newVal);


				var url = $button.parent().find('input').data('url') + '/' + newVal;

                var id = $button.parent().find('input').data('id');

				var urlCart = "{{ route('cart.cart') }}" + ' ' + '#product' + id +
                    ' .shoping__cart__total .child_shoping__cart__total';

                var selector = "#product" + id + ' .shoping__cart__total';

                var urlCartTotal = "{{ route('cart.cart') }}" + ' .total2';

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(res) {
                        if (res.id && newVal == 0) {
                            $("#product" + id).empty();
                        }
                        $(selector).load(urlCart);
                        $(".total1").load(urlCartTotal);
                    }
                });

			});

        });
    </script>
@endsection
