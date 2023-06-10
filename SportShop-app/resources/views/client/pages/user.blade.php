@section('title')
    Profile
@endsection
@extends('client.layouts.master')
@section('banner-page')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset("images/bg-02.jpg")}});">
		<h2 class="ltext-105 cl0 txt-center">
			Profile
		</h2>
	</section>
@endsection
@section('content')
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Infomation
            </h4>

            <form role="form" method="POST" action="{{ route('user.profile.update',[$users->id]) }}" onsubmit="return confirm('Are you sure?')">
                @csrf
                <div style="justify-content: center" class="flex-w flex-tr">
                    <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="{{ $errors->first('name')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="name" name="name" placeholder="Your Name" value="{{$users->name}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="{{ $errors->first('phone')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="phone" name="phone" placeholder="Your Phone" value="{{$users->phone}}">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="{{ $errors->first('email')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="email" name="email" placeholder="Your Email" value="{{$users->email}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="{{ $errors->first('address')?'is-invalid':''}} stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="address" name="address" placeholder="Your Address" value="{{$users->address}}">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <a href="{{route('user.profile.show.change.password',[$users->id])}}">Change password</a>
                        <a href="{{route('user.history.order',[$users->id])}}">Bill history</a>

                    </div>

                    <button style="width: 50%; margin-top:10px;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Update
                    </button>
                </div>
            </form>
		</div>
	</section>

	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11">
            <iframe width="100%" src="{{$webInfors->gg_map_link}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
	</div>
@endsection
