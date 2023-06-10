@section('title')
    Wishlist
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
			
									<div class="block2-txt-child2 flex-r p-t-3 addToCartButtonContainer">
										<form method="POST" action="{{route('wishlist.destroy',$product->id)}}">
											@csrf
											@method('DELETE')
											<button onclick="return confirm('Are you sure')" type="submit" class="btn-addwish-b2 dis-block pos-relative">
												<img style="opacity: 0" class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
												<img style="opacity: 1" class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
											</button>
										</form>
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
				swal("Product is remove from your wishlist !","", "success");
            });
        });
    </script>
@endsection