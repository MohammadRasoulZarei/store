@extends('home.layouts.home')

@section('title')
    سبد خرید
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{route('home.index')}}"> صفحه ای اصلی </a>
                    </li>
                    <li class="active"> سبد خرید </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="cart-main-area pt-95 pb-100 text-right" style="direction: rtl;">
        <div class="container">
            <h3 class="cart-page-title"> سبد خرید شما </h3>
            @if ($cart->isEmpty())
            <div class="container cart-empty-content" ">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <i class="sli sli-basket"></i>
                        <h2 class="font-weight-bold my-4">سبد خرید خالی است.</h2>
                        <p class="mb-40">شما هیچ کالایی در سبد خرید خود ندارید.</p>
                        <a href="shop.html"> ادامه خرید </a>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <form action="{{route('home.cart.update')}}" method="post">
                        @csrf
                        @method('put')
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th> تصویر محصول </th>
                                        <th> نام محصول </th>
                                        <th> فی </th>
                                        <th> تعداد </th>
                                        <th> قیمت </th>
                                        <th> عملیات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item )
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{route('home.product.show',['product'=>$item->associatedModel->slug])}}"><img width="100" src="{{asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$item->associatedModel->primary_image)}}" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="{{route('home.product.show',['product'=>$item->associatedModel->slug])}}">  {{$item->associatedModel->name}}
                                         </a>
                                         <p style="font-size: 12px;color:red">
                                            {{App\Models\Attribute::find($item->attributes->attribute_id)->name}} : {{$item->attributes->value}}
                                        </p>
                                        </td>
                                        <td class="product-price-cart">
                                            @if ($item->attributes->is_sale)
                                            <span class="amount">
                                                {{number_format($item->price)}}
                                                تومان
                                            </span>
                                            <span style="font-size: 12px;color:red;text-decoration: line-through;" >
                                                {{number_format($item->attributes->price)}}
                                                تومان
                                            </span>
                                            <p style="font-size: 12px;color:red">
                                                {{$item->attributes->percent_off}}% تخفیف
                                            </p>
                                            @else
                                            <span class="amount">
                                                {{number_format($item->price)}}
                                                تومان
                                            </span>
                                            @endif

                                        </td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton[{{$item->id}}]"
                                                    value="{{$item->quantity}}" data-max='{{$item->attributes->quantity}}'>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            {{number_format($item->getPriceSum())}}
                                            تومان
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{route('home.cart.delete',['delete'=>$item->id])}}"><i class="sli sli-close"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#"> ادامه خرید </a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit"> به روز رسانی سبد خرید </button>
                                        <a href="{{url('/cart-clear')}}"> پاک کردن سبد خرید </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-between">

                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray"> کد تخفیف </h4>
                                </div>
                                <div class="discount-code">
                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی </p>
                                    <form action="{{route('home.cart.checkCoupon')}}" method="post">
                                        @csrf
                                        <input type="text" required="" name="code">
                                        @error('code')
                                        <p>{{$message}}</p>
                                        @enderror
                                        <button class="cart-btn-2" type="submit"> ثبت </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart"> مجموع سفارش </h4>
                                </div>

                                <h5>
                                    مبلغ کل سفارش :
                                    <span>
                                        {{number_format(\cart::getTotal()+discountAmount())}}
                                        تومان
                                    </span>
                                </h5>
                                <h5>
                                    مبلغ تخفیف کالاها :
                                    <span>
                                        {{number_format(discountAmount())}}
                                        تومان
                                    </span>
                                </h5>
                                @if (session()->has('coupon'))
                                <div class="total-shipping" >

                                    <h5 >
                                         کد تخفیف :

                                        <span style="font-size: 16px">
                                          {{number_format(session('coupon.discount'))}}
                                     تومان
                                        </span>

                                    </h5>

                                </div>
                                @endif
                                <div class="total-shipping">
                                    <h5>
                                        هزینه ارسال :
                                        @if (cartTotalDelivery()==0)
                                        <span>
                                             ارسال رایگان
                                        </span>
                                        @else
                                        <span>
                                            {{number_format(cartTotalDelivery())}}
                                            تومان
                                        </span>
                                        @endif
                                    </h5>

                                </div>
                                <h4 class="grand-totall-title">
                                    جمع کل:
                                    <span>
                                        {{number_format(cartFinalTotal())}}
                                        تومان
                                    </span>
                                </h4>
                                <a href="{{route('home.order.checkout')}}"> ادامه فرآیند خرید </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>


    </div>
@endsection
@section('script')
    <script></script>
@endsection
