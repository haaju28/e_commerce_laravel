@section('title')
    Shop
@endsection
@extends('client.layouts.master')

@section('content')
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					@foreach ($productCategories as $productCategory)
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$productCategory->name}}">
							{{$productCategory->name}}
						</button>
					@endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
							Filter
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="{{ request()->fullUrlWithQuery([
										'sort-by'=>'price',
										'sort-type'=>'desc'
									])}}" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="{{ request()->fullUrlWithQuery([
										'sort-by'=>'price',
										'sort-type'=>'asc'
									])}}" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>


                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>
    
                            <div class="flex-w p-t-4 m-r--5">
                                @foreach ($productCategories as $productCategory)
                                    @if ($productCategory->is_show)
                                        <a href="{{ request()->fullUrlWithQuery([
											'category' => $productCategory->name,
											'sort-by'=>$sortBy,
											'sort-type'=>'desc'
										])}}"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        {{$productCategory->name}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
					</div>
					
				</div>
				
			</div>


			<div class="row isotope-grid">
				@foreach ($products as $product)
					{{-- @if ($product->status) --}}
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->product_category_name}}">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="{{asset("images/$product->image_url")}}" alt="{{$product->name}}">
			
									<a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										View detail
									</a>
								</div>
			
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											{{$product->name}}
										</a>
			
										<span class="stext-105 cl3">
											{{number_format($product->price, 0, ',', '.') }} vnd
										</span>
									</div>
			
									<div class="block2-txt-child2 flex-r p-t-3">

										@if (auth()->check())
											<?php
												$productId = $product->id;
												$userId = auth()->id();
											
												$wishlist = DB::table('wishlists')
													->where('product_id', $productId)
													->where('user_id', $userId)
													->first();
											?>

											@if($wishlist)
												<form method="POST" action="{{ route('wishlist.destroy', $product->id) }}">
													@csrf
													@method('DELETE')
													<button onclick="return confirm('Are you sure')" type="submit" class="removeFromCartButtonContainer btn-addwish-b2 dis-block pos-relative">
														<img style="opacity: 0" class="icon-heart1 dis-block trans-04" src="{{asset("images/icons/icon-heart-01.png")}}" alt="ICON">
														<img style="opacity: 1" class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset("images/icons/icon-heart-02.png")}}" alt="ICON">
													</button>
												</form>
											@else
												<a href="{{ route('wishlist.add', $product->id) }}" class="addToCartButtonContainer btn-addwish-b2 dis-block pos-relative">
													<img class="icon-heart1 dis-block trans-04" src="{{asset("images/icons/icon-heart-01.png")}}"alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset("images/icons/icon-heart-02.png")}}" alt="ICON">
												</a> 
											@endif

										@endif


									</div>
								</div>
							</div>
						</div>						
					{{-- @endif --}}

				@endforeach
			</div>
		
			<!-- Pagination -->
			<div class="flex-c-m flex-w w-full p-t-38">
				{{ $products->appends(request()->query())->links('pagination.custom_paginate') }} 
			</div>

		</div>
	</div>

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
        });
    </script>
@endsection