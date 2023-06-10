@section('title')
    Blog Detail
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

			<a href="{{route('blog')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{$blog->title}}
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="{{asset("images/$blog->image")}}" alt="{{$blog->title}}">

							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									{{ \Carbon\Carbon::parse($blog->created_at)->format('d')}}
								</span>

								<span class="stext-109 cl3 txt-center">
									{{ \Carbon\Carbon::parse($blog->created_at)->format('m/Y')}}
								</span>
							</div>
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> {{$blog->author}}
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									{{\Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									{{$blog->article_category_name}}
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								{{$blog->title}}
							</h4>

							<p class="stext-117 cl6 p-b-26">
                                {!! $blog->description !!}
							</p>
						</div>

						<div class="flex-w flex-t p-t-16">
							<span class="size-216 stext-116 cl8 p-t-4">
								Tags
							</span>

							<div class="flex-w size-217">
								<a href="{{route('blog')}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									{{$blog->article_category_name}}
								</a>
							</div>
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
                                    <li class="bor18">
                                        <a href="{{route('blog')}}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                            {{$blogCategory->name}}
                                        </a>
                                    </li>
                                @endforeach
							</ul>
						</div>


						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>

							<div class="flex-w m-r--5">
                                @foreach ($blogCategories as $blogCategory)
                                    <a href="{{route('blog')}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        {{$blogCategory->name}}
                                    </a>
                                @endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection
