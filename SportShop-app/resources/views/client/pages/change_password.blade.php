@section('title')
    Change password
@endsection
@extends('client.layouts.master')
@section('banner-page')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset("images/bg-02.jpg")}});">
		<h2 class="ltext-105 cl0 txt-center">
			Change password
		</h2>
	</section>	
@endsection
@section('content')
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form role="form" method="POST" action="{{ route('user.profile.change.password',[$users->id]) }}" onsubmit="return confirm('Are you sure?')">
						@csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
							Change password
						</h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="{{ $errors->first('password')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" id="password" name="password" placeholder="Your Password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="{{ $errors->first('password')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="password" name="password_confirmation" placeholder="Your Confirm Password">
                        </div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								{{$webInfors->address}}
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								{{$webInfors->phone}}
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								{{$webInfors->email}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11">
            <iframe width="100%" src="{{$webInfors->gg_map_link}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
	</div>
@endsection
