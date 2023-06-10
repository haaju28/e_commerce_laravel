@section('title')
    Product Detail
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

			<a href="{{route('shop')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{$product->name}}
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								@foreach ($product->image_product as $productImage)
									<div class="item-slick3" data-thumb="{{asset("images/$productImage->image")}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{asset("images/$productImage->image")}}" alt="{{$product->name}}">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset("images/$productImage->image")}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$product->name}}
						</h4>

						<span class="mtext-106 cl2">
							Price:   {{number_format($product->price, 0, ',', '.') }} vnd
						</span>

						<div class="mtext-106 cl2 flex-w">
							Quantity: <input style="margin-left: 20px" disabled type="text" name="stock" id="stock" value="{{$product->qty}}">
						</div>

						<p class="stext-102 cl3 p-t-23">
							{{$product->short_description}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" id="size-product" name="size-product" required>
											<option value="">Choose an option</option>
											@foreach ($product->sizes_product as $productSize)
												<option id="size-product" id="size-product" value="{{$productSize->size_id}}">Size {{$productSize->size->name}}</option>
											@endforeach
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" id="color-product" id="color-product" required>
											<option value="">Choose an option</option>
											@foreach ($product->colors_product as $productColor)
												<option id="color-product" id="color-product" value="{{$productColor->color_id}}">{{$productColor->color->name}}</option>
											@endforeach
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input disabled class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>


									<a  href="#" data-url="{{ route('cart.add-product', ['id' => $product->id]) }}" class="{{($product->qty < 1) ? "disabled" : ""}} add-to-cart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										{{($product->qty < 1) ? "Sold out" : "Add to cart"}}
									</a>

								</div>
							</div>	
						</div>

					</div>
				</div>
			</div>


			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{!!$product->description!!}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												{{$product->weight}} kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												{{$product->dimensions}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												{{$product->materials}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												@foreach ($product->colors_product as $productColor)
													{{$productColor->color->name}}, 
												@endforeach
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												@foreach ($product->sizes_product as $productSize)
													{{$productSize->size->name}}
												@endforeach
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Name: {{$product->name}}
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: {{$product->category->name}}
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach ($relatedProducts as $relatedProduct)
						@if ($relatedProduct->status)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{asset("images/$relatedProduct->image_url")}}" alt="{{$relatedProduct->name}}">
										<a href="{{ route('product.detail', ['slug' => $relatedProduct->slug]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											View detail
										</a>
									</div>
									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('product.detail', ['slug' => $relatedProduct->slug]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{$relatedProduct->name}}
											</a>
											<span class="stext-105 cl3">
												{{number_format($relatedProduct->price, 0, ',', '.') }} vnd
											</span>
										</div>
										<div class="block2-txt-child2 flex-r p-t-3">

                                            @if (auth()->check())
                                                <?php
                                                    $productId = $relatedProduct->id;
                                                    $userId = auth()->id();
                                                
                                                    $wishlist = DB::table('wishlists')
                                                        ->where('product_id', $productId)
                                                        ->where('user_id', $userId)
                                                        ->first();
                                                ?>

                                                @if($wishlist)
                                                    <form method="POST" action="{{ route('wishlist.destroy', $relatedProduct->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure')" type="submit" class="removeFromCartButtonContainer btn-addwish-b2 dis-block pos-relative">
                                                            <img style="opacity: 0" class="icon-heart1 dis-block trans-04" src="{{asset("images/icons/icon-heart-01.png")}}" alt="ICON">
                                                            <img style="opacity: 1" class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset("images/icons/icon-heart-02.png")}}" alt="ICON">
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('wishlist.add', $relatedProduct->id) }}" class="addToCartButtonContainer btn-addwish-b2 dis-block pos-relative">
                                                        <img class="icon-heart1 dis-block trans-04" src="{{asset("images/icons/icon-heart-01.png")}}"alt="ICON">
                                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset("images/icons/icon-heart-02.png")}}" alt="ICON">
                                                    </a> 
                                                @endif

                                            @endif

                                        </div>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</section>
		
	
@endsection
@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
			$('.addToCartButtonContainer').on('click', function(event) {
				swal("Product is added to wishlist !","", "success");
            });

			$('.removeFromCartButtonContainer').on('click', function(event) {
				swal("Product is remove from your wishlist !","", "success");
            });


            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
				var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                var qty = parseInt($('#num-product').val());
				var size = $('#size-product').val();
				var color = $('#color-product').val();
				var stock = parseInt($('#stock').val());
				
				if (color === "" || size === "") {
					// Hiển thị thông báo lỗi
					swal("Please select both color and size !","", "warning");
					return;
            	}
				if (qty > stock) {
					// Hiển thị thông báo lỗi
					swal("The quantity ordered exceeds the available stock. Please adjust the quantity !","", "warning");
					return;
            	}

				if (qty == 0) {
					// Hiển thị thông báo lỗi
					swal("Please choose quantity !","", "warning");
					return;
            	}

                url += '/'+qty+'/'+ color +'/'+ size;

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(res) {
						swal(nameProduct, "is added to cart !", "success");

                        $('.header__cart .header__cart__price').html('item: <span>$'+res.total_cart+'</span>');
                        $('.header__cart .total-products').attr('data-notify', res.total_products);
                    },
                    statusCode: {
                        401: function() {
                            window.location.href = "{{ route('login') }}";
                        }
                    }
                });
            });
        });
    </script>
@endsection
