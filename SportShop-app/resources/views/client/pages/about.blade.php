@section('title')
    About
@endsection
@extends('client.layouts.master')
@section('banner-page')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	
@endsection
@section('content')
	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							{{$about->first_title}}
						</h3>

						<p class="stext-113 cl6 p-b-26">
							{!! $about->first_content !!}
						</p>

					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{asset("images/$about->first_image")}}" alt="{{$about->first_title}}">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							{{$about->second_title}}
						</h3>

						<p class="stext-113 cl6 p-b-26">
							{!! $about->second_content !!}
						</p>

					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{asset("images/$about->second_image")}}" alt="{{$about->second_title}}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
@endsection
