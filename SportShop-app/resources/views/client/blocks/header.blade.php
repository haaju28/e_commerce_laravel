<style>
    .is_login{
        display: none;
    }
</style>

<header class="{{request()->route()->getName() == 'home' ? '' : 'header-v4'}}">
    <!-- Header desktop -->
    <div class="container-menu-desktop {{request()->route()->getName() == 'login' ? 'is_login' : ''}}">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    {{$webInformation->address}}
                </div>

                <div class="right-top-bar flex-w h-full">
                    @guest
                        <a class="flex-c-m trans-04 p-lr-25" href="{{route('login')}}">Login</a>
                    @endguest
                    @auth
                        <a class="flex-c-m trans-04 p-lr-25" href="{{route('user.profile',['id' => Auth::user()->id])}}">{{Auth::user()->name}}</a>
                        <a class="flex-c-m trans-04 p-lr-25">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="text-light" type="submit">Logout</button>
                            </form>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset("images/$webInformation->logo_img")}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{request()->route()->getName() == 'home' ? 'active-menu' : ''}}">
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li class="{{request()->route()->getName() == 'shop' ? 'active-menu' : ''}}">
                            <a href="{{route('shop')}}">Shop</a>
                        </li>

                        <li class="{{request()->route()->getName() == 'blog' ? 'active-menu' : ''}}">
                            <a href="{{route('blog')}}">Blog</a>
                        </li>

                        <li class="{{request()->route()->getName() == 'about' ? 'active-menu' : ''}}">
                            <a href="{{route('about')}}">About</a>
                        </li>

                        <li class="{{request()->route()->getName() == 'contact.index' ? 'active-menu' : ''}}">
                            <a href="{{route('contact.index')}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m header__cart">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>


                    @php
                        $total = 0;
                        if(session()->has('cart')){
                            $total = count(session()->get('cart'));
                        }
                    @endphp
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti total-products"
                        data-notify="{{ $total }}">
                        <a href="{{route('cart.cart')}}" style="color: black"><i class="zmdi zmdi-shopping-cart"></i></a>
                    </div>


                    @if (auth()->check())
                        <?php
                            $userId = auth()->id();
                        
                            $wishlistCount = DB::table('wishlists')
                                ->where('user_id', $userId)
                                ->count();
                        ?>
                        <a href="{{route('wishlist.index')}}"
                            class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="{{$wishlistCount}}">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    @endif

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile {{request()->route()->getName() == 'login' ? 'is_login' : ''}}">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{route('home')}}"><img src="{{asset("images/$webInformation->logo_img")}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15 header__cart">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
            @php
                $total = 0;
                if(session()->has('cart')){
                    $total = count(session()->get('cart'));
                }
            @endphp

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti total-products"
                data-notify="{{$total}}">
                <a href="{{route('cart.cart')}}" style="color: black"><i class="zmdi zmdi-shopping-cart"></i></a>
            </div>

            @if (auth()->check())
                <?php
                        $userId = auth()->id();
                    
                        $wishlistCount = DB::table('wishlists')
                            ->where('user_id', $userId)
                            ->count();
                ?>

                <a href="{{route('wishlist.index')}}"
                    class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                    data-notify="{{$wishlistCount}}">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            @endif


        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile {{request()->route()->getName() == 'login' ? 'is_login' : ''}}">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    {{$webInformation->address}}
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Home</a>
            </li>

            <li>
                <a href="{{route('shop')}}">Shop</a>
            </li>

            <li>
                <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="{{route('blog')}}">Blog</a>
            </li>

            <li>
                <a href="{{route('about')}}">About</a>
            </li>

            <li>
                <a href="{{route('contact.index')}}">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search {{request()->route()->getName() == 'login' ? 'is_login' : ''}}">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="{{url('/shop/search')}}" method="get">
                <button type="submit" class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
