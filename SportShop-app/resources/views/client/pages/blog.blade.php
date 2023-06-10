@section('title')
    Blog
@endsection
@extends('client.layouts.master')
@section('banner-page')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset("images/bg-02.jpg")}});">
		<h2 class="ltext-105 cl0 txt-center">
			Blog
		</h2>
	</section>
@endsection
@section('content')

	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						@foreach ($blogs as $blog)
							<!-- item blog -->
							<div class="p-b-63">
								<a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" class="hov-img0 how-pos5-parent">
									<img src="{{asset("images/$blog->image")}}" alt="{{$blog->title}}">

									<div class="flex-col-c-m size-123 bg9 how-pos5">
										<span class="ltext-107 cl2 txt-center">
											{{ \Carbon\Carbon::parse($blog->created_at)->format('d')}}
										</span>

										<span class="stext-109 cl3 txt-center">
											{{ \Carbon\Carbon::parse($blog->created_at)->format('m/Y')}}
										</span>
									</div>
								</a>

								<div class="p-t-32">
									<h4 class="p-b-15">
										<a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" class="ltext-108 cl2 hov-cl1 trans-04">
											{{$blog->title}}
										</a>
									</h4>

									<p class="stext-117 cl6">
										{{$blog->short_description}}
									</p>

									<div class="flex-w flex-sb-m p-t-18">
										<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
											<span>
												<span class="cl4">By</span> {{$blog->author}}
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>

											<span>
												{{$blog->article_categories_name}}
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>
										</span>

										<a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
											Continue Reading

											<i class="fa fa-long-arrow-right m-l-9"></i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
							{{ $blogs->appends(request()->query())->links('pagination.custom_paginate') }}
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<form class="" action="{{route('blog.search')}}" method="get">
								<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

								<button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
									<i class="zmdi zmdi-search"></i>
								</button>
							</form>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>
							<ul>
								@foreach ($blogCategories as $blogCategory)
									@if ($blogCategory->is_show)
										<li class="bor18">
											<a href="{{ request()->fullUrlWithQuery([
												'category' => $blogCategory->name,
												'sort-by'=>$sortBy,
												'sort-type'=>'desc'
											])}}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
												{{$blogCategory->name}}
											</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>

						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>

							<div class="flex-w m-r--5">
								@foreach ($blogCategories as $blogCategory)
									@if ($blogCategory->is_show)
										<a href="{{ request()->fullUrlWithQuery([
											'category' => $blogCategory->name,
											'sort-by'=>$sortBy,
											'sort-type'=>'desc'
											])}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
											{{$blogCategory->name}}
										</a>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
