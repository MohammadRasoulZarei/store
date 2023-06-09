<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close">
        <i class="sli sli-close"></i>
    </a>
    @php
    $category_parents=App\Models\Category::where('parent_id',0)->get();
@endphp

    <div class="header-mobile-aside-wrap">
        <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder=" ... جستجو " />
                <button class="button-search">
                    <i class="sli sli-magnifier"></i>
                </button>
            </form>
        </div>

        <div class="mobile-menu-wrap">
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu text-right">
                        <li class="menu-item-has-children">
                            <a href="{{route('home.index')}}"> صفحه ای اصلی </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop.html">فروشگاه</a>
                            <ul class="dropdown">
                                @foreach ($category_parents as $parent )
                                <li class="menu-item-has-children">
                                    <a href="{{route('home.category.show',['category'=>$parent->slug])}}">{{$parent->name}}</a>
                                    <ul class="dropdown">
                                        @foreach ($parent->children as $child )
                                        <li><a href="{{route('home.category.show',['category'=>$child->slug])}}"> {{$child->name}} </a></li>
                                        @endforeach


                                    </ul>
                                </li>
                                @endforeach



                            </ul>
                        </li>

                        <li><a href="contact-us.html">تماس با ما</a></li>

                        <li><a href="about_us.html"> در باره ما</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
        </div>

        <div class="mobile-curr-lang-wrap">
            <div class="single-mobile-curr-lang">
                <ul class="text-right">
                    @auth
                    <li><a href="my-account.html">پروفایل</a></li>
                    @else
                    <li><a href="{{route('login')}}">ورود</a></li>
                    <li>
                        <a href="{{route('register')}}">ایجاد حساب</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>

        <div class="mobile-social-wrap text-center">
            <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
            <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
            <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
            <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
            <a class="google" href="#"><i class="sli sli-social-google"></i></a>
        </div>
    </div>
</div>
