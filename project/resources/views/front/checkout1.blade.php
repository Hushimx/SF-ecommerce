<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@if($langg->rtl == "1")
    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
		<title>{{$gs->title}}</title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
		<title>{{$gs->title}}</title>
    @elseif(isset($productt))
	    <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
	    <meta property="og:title" content="{{$productt->name}}" />
	    <meta property="og:description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
	    <meta property="og:image" content="{{asset('assets/images/'.$productt->photo)}}" />
	    <meta name="author" content="GeniusOcean">
    	<title>{{($productt->name)}} - Soft-Fire.com</title>
    @else
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->title}}</title>
    @endif
	@else
	@if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
		<title>{{$gs->titleen}}</title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
		<title>{{$gs->titleen}}</title>
    @elseif(isset($productt))
	    <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
	    <meta property="og:title" content="{{$productt->name}}" />
	    <meta property="og:description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
	    <meta property="og:image" content="{{asset('assets/images/'.$productt->photo)}}" />
	    <meta name="author" content="GeniusOcean">
    	<title>{{($productt->name)}} - Soft-Fire.com</title>
    @else
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->titleen}}</title>
    @endif
    @endif

	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
	<!-- bootstrap -->
	@if($langg->rtl == "0")
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	@else
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/bootstraprtl.min.css')}}">
	@endif
	<!-- Plugin css -->
	@if($langg->rtl == "0")
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	@else
	<link rel="stylesheet" href="{{asset('assets/front/css/pluginrtl.css')}}">
	@endif
	<link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">	
	<link rel="stylesheet" href="{{asset('assets/front/css/toastr.css')}}">
	<link rel="manifest" href="manifest.json" />
	<!-- jQuery Ui Css-->
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.structure.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.theme.min.css')}}">

@if($langg->rtl == "1")

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/custom.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">
@else 

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">	
@endif


	<!--Updated CSS-->
	

<!--------------------------------------------------------------->
	<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

<!--------------------------------------------------------------->


</head>

<body>

@if($gs->is_loader == 1)
 @if(isset($sliders))
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif
@endif

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <ul class="pages">
          <li>
            <a href="{{ route('front.index') }}">
              {{ $langg->lang17 }}
            </a>
          </li>
          <li>
            <a href="{{ route('front.checkout') }}">
              {{ $langg->lang136 }}
            </a>
          </li>
        </ul>
      </div>
      <!--<div class="col-lg-6 @if(Session::get('language') == 14) text-left @endif">
        <a href="javascript:;" id="step4-btn" class="mybtn2 btn">{{ $langg->lang753 }}</a>
      </div>-->
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Check Out Area Start -->
<section class="checkout">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="checkout-area mb-0 pb-0">
          <div class="checkout-process">
            <ul class="nav" role="tablist">
              <!------------- Start Step 2 Button -------------->
              <li class="nav-item">
                <a class="nav-link active" id="pills-step2-tab" data-toggle="pill" href="#pills-step2" role="tab"
                  aria-controls="pills-step2" aria-selected="true">
                  <span>1</span> {{ $langg->lang744 }}
                  <i class="fas fa-dolly"></i>
                </a>
              </li>
              <!------------- End Step 2 Button -------------->
              <!------------- Start Step 3 Button -------------->
              <li class="nav-item">
                <a class="nav-link disabled" id="pills-step4-tab" data-toggle="pill" href="#pills-step4" role="tab"
                  aria-controls="pills-step4" aria-selected="false">
                  <span>2</span>
                  @if( $digital == 0 )
                  {{ $langg->lang773 }}
                  <i class="fas fa-shipping-fast"></i>
                  @else
                  {{ $langg->lang743 }}
                  <i class="far fa-address-card"></i>
                  @endif

                </a>
              </li>

              <!------------- End Step 3 Button -------------->
              <!------------- Start Step 4 Button -------------->
              <li class="nav-item">
                <a class="nav-link disabled" id="pills-step3-tab" data-toggle="pill" href="#pills-step3" role="tab"
                  aria-controls="pills-step3" aria-selected="false">
                  <span>3</span> {{ $langg->lang745 }}
                  <i class="far fa-credit-card"></i>
                </a>
              </li>
              <!------------- End Step 4 Button -------------->
            </ul>
          </div>
        </div>
      </div>

      <!--------------- Start Form Div ---------------->
      <div class="col-lg-8">
        <form id="step1-form" action="{{route('paylink.submit')}}" method="POST" class="checkoutform">

          @include('includes.form-success')
          @include('includes.form-error')

          {{ csrf_field() }}

          <div class="checkout-area">
            <div class="tab-content" id="pills-tabContent">


              <!--------------- Start Tab 2 ---------------->
              <div class="tab-pane fade show active" id="pills-step2" role="tabpanel" aria-labelledby="pills-step2-tab">
                <div class="content-box">
                  <div class="content">
                    <div class="order-area">
                      @foreach($products as $product)
                      <div class="order-item">
                        <div class="product-img">
                          <div class="d-flex">
                            <img src="{{ asset('assets/images/products/'.$product['item']['photo']) }}" height="80"
                              width="80" class="p-1">

                          </div>
                        </div>
                        <div class="product-content">
                          <p class="name"><a href="{{ route('front.product', $product['item']['slug']) }}"
                              target="_blank">{{ $product['item']['name'] }}</a></p>
                          <div class="unit-price">
                            <h5 class="label">{{ $langg->lang754 }} : </h5>
                            <p>{{ App\Models\Product::convertPrice($product['item']['price']) }} </p>
                          </div>
                          <div class="quantity">
                            <h5 class="label">{{ $langg->lang755 }} : </h5>
                            <span class="qttotal">{{ $product['qty'] }} </span>
                          </div>
                          <div class="total-price">
                            <h5 class="label">{{ $langg->lang756 }} : </h5>
                            <p>{{ App\Models\Product::convertPrice($product['price']) }} </p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="row">
                      <div class="col-lg-12 mt-3">
                        <div class="bottom-area text-center">
                          <a href="javascript:;" id="step4-btn" class="mybtn2 btn">{{ $langg->lang753 }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------- End Tab 2 ---------------->
              <!--------------- Start Tab 3-1 ---------------->
              <input type="hidden" id="current_lang" value="{{Session::get('language')}}">
              @if($first_order->shipping_zip)
              <div class="tab-pane fade" id="pills-step4" role="tabpanel" aria-labelledby="pills-step4-tab">
                <div class="content-box">
                  <div class="content">
                    <div class="ship-diff-addres-area">
                      @if($digital == 0 )

                      <h5 class="title">{{ $langg->lang752 }}</h5>
                      <div class="row justify-content-around address  m-5">
                        <div class="col-lg-4 p-2 mb-2 text-center border" id="new-add">
                          <p style="font-weight: bold">
                            <i class="fas fa-map-marker-alt"></i>
                          </p>
                          <p>{{ $langg->lang774 }}</p>
                        </div>
                        <div class="col-lg-4 p-2 text-right border active" id="old-add">
                          <p style="font-weight: bold">
                            <i class="fas fa-map-marker-alt"></i>
                            @if (Session::get('language') == 1)
                            {{(DB::table('cities')->where('id','=', $first_order->customer_city)->first()->name_en)}} -
                            {{(DB::table('countries')->where('id','=', $first_order->customer_country)->first()->name_en)}}
                            @else
                            {{(DB::table('cities')->where('id','=', $first_order->customer_city)->first()->name_ar)}}
                            -
                            {{(DB::table('countries')->where('id','=', $first_order->customer_country)->first()->name_ar)}}
                            @endif
                          </p>
                          <p>{{$first_order->customer_zip}}</p>
                        </div>
                      </div>
                      @else
                      <h5 class="title">{{ $langg->lang147 }}</h5>
                      @endif
                      <div class="row">
                        <div class="col-lg-12">
                          <label for="name">{{ $langg->lang747 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_name"
                            placeholder="{{ $langg->lang747 }}" value="{{ Auth::check() ? Auth::user()->name : '' }}"
                            {!! Auth::check() ? 'readonly' : '' !!}>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="ship_email">{{ $langg->lang748 }}:</label>
                          <input class="form-control ship_input" type="email" name="shipping_email" id="ship_email"
                            placeholder="{{ $langg->lang748 }}" value="{{ Auth::check() ? Auth::user()->email : '' }}"
                            {!! Auth::check() ? 'readonly' : '' !!}>
                        </div>
                        <div class="col-lg-6">
                          <label for="shipingPhone_number">{{ $langg->lang153 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_phone"
                            id="shipingPhone_number" placeholder="{{ $langg->lang153 }}"
                            value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->phone : '' }}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="shipping_country">{{ $langg->lang157 }}:</label>
                          @if($digital == 0)
                          <select class="form-control country" id="shipping_country">
                            <option value="0" data-icon="{{ asset('assets/images/flag_imges/worldwide.jpg') }}">{{ $langg->lang157 }}</option>
                            @foreach($grp_shipping_countries as $ctry)
                            <option value="{{$ctry->id}}" data-icon="{{ asset('assets/images/'.$ctry->art_image) }}">
                              @if(Session::get('language') == 1)
                              {{$ctry->name_en}}
                              @else
                              {{$ctry->name_ar}}
                              @endif </option>
                            @endforeach
                          </select>
                          @else
                          <select class="form-control country" id="shipping_country">
                            <option value="0" data-icon="{{ asset('assets/images/flag_imges/worldwide.jpg') }}">{{ $langg->lang157 }}</option>
                            @foreach($countries as $ctryy)
                            <option value="{{$ctryy['id']}}" data-icon="{{ asset('assets/images/'.$ctryy->art_image) }}">
                              @if (Session::get('language') == 1)
                               {{$ctryy->name_en}}
                              @else {{$ctryy->name_ar}} @endif</option>
                            @endforeach
                          </select>
                          @endif
                          <p class="text-danger text-right" id="shipp-country-error"></p>
                        </div>
                        <div class="col-lg-6" id="shipping_data">
                          <label for="shipping_city">{{ $langg->lang158 }}:</label>
                          @if(is_numeric($first_order->customer_city))
                          <select class="form-control city" id="shipping_city" name="city">
                            <option value="0">{{ $langg->lang158 }}</option>
                            @foreach($cities as $city)
                            <option value="{{$city['id']}}" @if($first_order->customer_city==$city['id'])
                              selected="selected" @endif>
                              @if(Session::get('language') == 1){{ $city['name_en'] }}
                              @else {{ $city['name_ar'] }} @endif
                            </option>
                            @endforeach
                          </select>
                          @else
                          <input type="text" class="form-control" name="city" value="{{ $first_order->customer_city }}"
                            id="shipping_city">
                          @endisset
                        </div>
                      </div>
                      <p class="text-danger text-right" id="shipp-city-error"></p>
                      <div class="row mt-2">
                        <div class="col-lg-6">
                          <label for="shipping_address">{{ $langg->lang155 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_address"
                            id="shipping_address" placeholder="{{ $langg->lang155 }}"
                            value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->address : '' }}">
                        </div>
                        <div class="col-lg-6">
                          <label for="shippingPostal_code">{{ $langg->lang159 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_zip"
                            value="{{$first_order->customer_zip}}" id="shippingPostal_code"
                            placeholder="{{ $langg->lang159 }}">
                          <p class="text-danger text-right" id="shipp-zip-error">
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="order-note mt-3">
                      <div class="row">
                        <div class="col-lg-12">
                          <input type="text" id="Order_Note" class="form-control" name="order_notes"
                            placeholder="{{ $langg->lang217 }} ({{ $langg->lang218 }})">
                        </div>
                      </div>
                    </div>
                    <!----- Start Shipping ------------------->
                    @if($digital == 0)
                    <div class="quantity">
                      <h5 class="title mt-3">{{ $langg->lang765 }} : </h5>
                      {{-- Shipping Method Area Start --}}
                      <div class="packeging-area" id="ship-area">

                      </div>
                      {{-- Shipping Method Area End --}}
                    </div>
                    @endif
                    <!----------- End Shipping --------------->
                    <div class="row">
                      <div class="col-lg-12 mt-3">
                        <div class="bottom-area text-center">
                          <a href="javascript:;" id="step2-btn" class="btn mybtn2 mr-3">{{ $langg->lang757 }}</a>
                          <a href="javascript:;" id="step3-btn" class="btn mybtn2">{{ $langg->lang753 }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @else

              <div class="tab-pane fade" id="pills-step4" role="tabpanel" aria-labelledby="pills-step4-tab">
                <div class="content-box">
                  <div class="content">
                    <div class="ship-diff-addres-area">
                      <h5 class="title">
                        @if($digital ==0 )
                        {{ $langg->lang752 }}
                        @else
                        {{ $langg->lang147 }}
                        @endif
                      </h5>
                      <div class="row">
                        <div class="col-lg-12">
                          <label for="name">{{ $langg->lang747 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_name"
                            placeholder="{{ $langg->lang747 }}" value="{{ Auth::check() ? Auth::user()->name : '' }}"
                            {!! Auth::check() ? 'readonly' : '' !!}>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="ship_email">{{ $langg->lang153 }}:</label>
                          <input class="form-control ship_input" type="email" name="shipping_email" id="ship_email"
                            placeholder="{{ $langg->lang748 }}" value="{{ Auth::check() ? Auth::user()->email : '' }}"
                            {!! Auth::check() ? 'readonly' : '' !!}>
                        </div>
                        <div class="col-lg-6">
                          <label for="shipingPhone_number">{{ $langg->lang153 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_phone"
                            id="shipingPhone_number" placeholder="{{ $langg->lang153 }}"
                            value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->phone : '' }}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          @if($digital == 0)
                          <label for="shipping_country">{{ $langg->lang157 }}:</label>
                          <select class="form-control country" id="shipping_country">
                            <option value="0" data-icon="{{ asset('assets/images/flag_imges/worldwide.jpg') }}">{{ $langg->lang157 }}</option>
                            @foreach($grp_shipping_countries as $ctry)
                            <option value=" {{$ctry->id}}" data-icon="{{ asset('assets/images/'.$ctry->art_image) }}">
                              @if(Session::get('language') == 1)
                              @else
                              {{ $ctry->name_ar }} @endif</option>
                            @endforeach
                          </select>
                          @else
                          <label for="shipping_country">{{ $langg->lang157 }}:</label>
                          <select class="form-control country" id="shipping_country">
                            <option value="0" data-icon="{{ asset('assets/images/flag_imges/worldwide.jpg') }}">{{ $langg->lang157 }}</option>
                            @foreach($countries as $ctryy)
                            <option value="{{$ctryy['id']}}" data-icon="{{ asset('assets/images/'.$ctryy['art_image']) }}">
                              @if(Session::get('language') == 1)
                              {{ $ctryy['name_en'] }}
                              @else
                              {{ $ctryy['name_ar'] }} @endif</option>
                            @endforeach
                          </select>
                          @endif
                          <p class="text-danger text-right" id="shipp-country-error"></p>
                        </div>
                        <div class="col-lg-6" id="shipping_data">
                          <label for="shipping_city">{{ $langg->lang158 }}:</label>
                          <select class="form-control city" id="shipping_city" name="city">
                            <option value="0">{{ $langg->lang158 }}</option>
                          </select>
                        </div>
                      </div>
                      <p class="text-danger text-right" id="shipp-city-error"></p>
                      <div class="row mt-2">
                        <div class="col-lg-6">
                          <label for="shipping_address">{{ $langg->lang155 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_address"
                            id="shipping_address" placeholder="{{ $langg->lang155 }}"
                            value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->address : '' }}">
                        </div>
                        <div class="col-lg-6">
                          <label for="shippingPostal_code">{{ $langg->lang159 }}:</label>
                          <input class="form-control ship_input" type="text" name="shipping_zip"
                            id="shippingPostal_code" placeholder="{{ $langg->lang159 }}">
                          <p class="text-danger text-right" id="shipp-zip-error"></p>
                        </div>
                      </div>
                    </div>
                    <div class="order-note mt-3">
                      <div class="row">
                        <div class="col-lg-12">
                          <input type="text" id="Order_Note" class="form-control" name="order_notes"
                            placeholder="{{ $langg->lang217 }} ({{ $langg->lang218 }})">
                        </div>
                      </div>
                    </div>
                    <!----- Start Shipping ------------------->
                    @if($digital == 0)
                    <div class="quantity">
                      <h5 class="title mt-3">{{ $langg->lang765 }} : </h5>
                      {{-- Shipping Method Area Start --}}
                      <div class="packeging-area" id="ship-area">

                      </div>
                      {{-- Shipping Method Area End --}}
                    </div>
                    @endif
                    <!----------- End Shipping --------------->
                    <div class="row">
                      <div class="col-lg-12 mt-3">
                        <div class="bottom-area text-center">
                          <a href="javascript:;" id="step2-btn" class="btn mybtn2 mr-3">{{ $langg->lang757 }}</a>
                          <a href="javascript:;" id="step3-btn" class="btn mybtn2">{{ $langg->lang753 }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <!--------------- End Tab 3 ---------------->
              <!--------------- Start Tab 4 ---------------->
              <div class="tab-pane fade" id="pills-step3" role="tabpanel" aria-labelledby="pills-step3-tab">
                <div class="content-box">
                  <div class="content">

                    <div class="billing-info-area">
                      <ul class="info-list">
                        <li>
                          <p id="shipping_user"></p>
                        </li>
                        <li>
                          <p id="shipping_location"></p>
                        </li>
                        <li>
                          <p id="shipping_phone"></p>
                        </li>
                        <li>
                          <p id="shipping_email"></p>
                        </li>
                      </ul>
                    </div>
                    <div class="payment-information">
                      <h4 class="title">
                        {{ $langg->lang759 }}
                      </h4>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="nav flex-column" role="tablist" aria-orientation="vertical">
                            <a class="nav-link payment active" data-show="no" data-form="{{route('paylink.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'paylink','slug2' => 0]) }}"
                              id="v-pills-tab0-tab" data-toggle="pill" href="#v-pills-tab0" role="tab"
                              aria-controls="v-pills-tab0" aria-selected="true">
                              <div class="cc-selector-1">
                                <input id="visa2" type="radio" checked="checked" name="pymt" value="visa" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa2">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url({{ asset('assets/front/images/paylink.jpg') }}"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Paylink</p>
                                      <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Paylink</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>
                            @if($digital != 0)
                            @if($gs->paypal_check == 1)
                            <a class="nav-link payment " data-show="no" data-form="{{route('paypal.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'paypal','slug2' => 0]) }}"
                              id="v-pills-tab1-tab" data-toggle="pill" href="#v-pills-tab1" role="tab"
                              aria-controls="v-pills-tab1" aria-selected="true">
                              <div class="cc-selector-1">
                                <input id="visa1" type="radio" name="pymt" value="visa1" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa1">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url({{ asset('assets/front/images/paypal.png') }}"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Paypal</p>
                                      <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Paypal</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>
                            @endif
                            @endif
                            @if($gs->stripe_check == 1)
                            <a class="nav-link payment" data-show="yes" data-form="{{route('stripe.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'stripe','slug2' => 0]) }}"
                              id="v-pills-tab2-tab" data-toggle="pill" href="#v-pills-tab2" role="tab"
                              aria-controls="v-pills-tab2" aria-selected="false">
                              <div class="cc-selector-1">
                                <input id="visa3" type="radio" name="pymt" value="visa3" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa3">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url(http://i.imgur.com/lXzJ1eB.png""></span>
                                    </div>
                                    <div class=" col-sm-8 px-4">
                                        <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Strip</p>
                                        <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Strip</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>
                            @endif
                            @if($gs->cod_check == 1)
                            @if($digital == 0)
                            <a class="nav-link payment" data-show="no" data-form="{{route('cash.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'cod','slug2' => 0]) }}"
                              id="v-pills-tab3-tab" data-toggle="pill" href="#v-pills-tab3" role="tab"
                              aria-controls="v-pills-tab3" aria-selected="false">
                              <div class="cc-selector-1">
                                <input id="visa4" type="radio" name="pymt" value="visa4" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa4">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url(http://i.imgur.com/lXzJ1eB.png"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Cash</p>
                                      <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Cash</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>
                            @endif
                            @endif
                            @if($gs->is_instamojo == 1)
                            <a class="nav-link payment" data-show="no" data-form="{{route('instamojo.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'instamojo','slug2' => 0]) }}"
                              id="v-pills-tab4-tab" data-toggle="pill" href="#v-pills-tab4" role="tab"
                              aria-controls="v-pills-tab4" aria-selected="false">
                              <div class="cc-selector-1">
                                <input id="visa5" type="radio" name="pymt" value="visa5" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa5">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url(http://i.imgur.com/lXzJ1eB.png"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Cash</p>
                                      <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Cash</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>
                            @endif
                            @if($gs->is_paystack == 1)
                            <a class="nav-link payment" data-show="no" data-form="{{route('paystack.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'paystack','slug2' => 0]) }}"
                              id="v-pills-tab5-tab" data-toggle="pill" href="#v-pills-tab5" role="tab"
                              aria-controls="v-pills-tab5" aria-selected="false">
                              <div class="cc-selector-1">
                                <input id="visa6" type="radio" name="pymt" value="visa6" />
                                <label class="w-100 drinkcard-cc1 visa p-2 d-flex flex-column justify-content-center"
                                  for="visa6">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url(http://i.imgur.com/lXzJ1eB.png"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> Paystack</p>
                                      <p class="m-0 py-1"><i class="fas fa-info-circle"></i> Pay With Paystack</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>

                            @endif


                            @foreach($gateways as $gt)

                            <a class="nav-link payment" data-show="yes" data-form="{{route('gateway.submit')}}"
                              data-href="{{ route('front.load.payment',['slug1' => 'other','slug2' => $gt->id]) }}"
                              id="v-pills-tab{{ $gt->id }}-tab" data-toggle="pill" href="#v-pills-tab5" role="tab"
                              aria-controls="v-pills-tab{{ $gt->id }}" aria-selected="false">
                              <div class="cc-selector-1">
                                <input id="visa{{ $gt->id }}" type="radio" name="pymt" value="0" />
                                <label class="w-100 drinkcard-cc1 visa p-3 d-flex flex-column justify-content-center"
                                  for="visa{{ $gt->id }}">
                                  <div class="row">
                                    <div class="col-sm-2 align-items-center"><span class="ship-img"
                                        style="background-image:url({{ asset('assets/front/images/'.$gt->image) }})"></span>
                                    </div>
                                    <div class="col-sm-8 px-4">
                                      <p class="m-0 py-1 shipping_icon"><i class="far fa-credit-card"></i> {{ $gt->title }}</p>
                                      <p class="m-0 py-1"><i
                                          class="fas fa-info-circle"></i>{{ strip_tags($gt->subtitle) }}</p>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </a>

                            @endforeach

                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="pay-area d-none">
                            <div class="tab-content" id="v-pills-tabContent">
                              <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel"
                                aria-labelledby="v-pills-tab1-tab">
                                <input type="hidden" name="method" value="Paypal">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="no_note" value="1">
                                <input type="hidden" name="lc" value="UK">
                                <input type="hidden" name="currency_code" value="{{$curr->name}}">
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
                              </div>
                              <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel"
                                aria-labelledby="v-pills-tab2-tab">

                              </div>
                              <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel"
                                aria-labelledby="v-pills-tab3-tab">

                              </div>
                              <div class="tab-pane fade" id="v-pills-tab4" role="tabpanel"
                                aria-labelledby="v-pills-tab4-tab">


                              </div>
                              <div class="tab-pane fade" id="v-pills-tab5" role="tabpanel"
                                aria-labelledby="v-pills-tab5-tab">

                              </div>
                              @foreach($gateways as $gt)

                              <div class="tab-pane fade" id="v-pills-tab{{ $gs->id }}" role="tabpanel"
                                aria-labelledby="v-pills-tab{{ $gs->id }}-tab">

                              </div>

                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="billing-address">

                      </div>


                    </div>

                    <div class="row">
                      <div class="col-lg-12 mt-3">
                        <div class="bottom-area text-center">
                          @if ($digital == 0)
                          <a href="javascript:;" id="step5-btn" class="btn mybtn2 mr-3">{{ $langg->lang757 }}</a>
                          @else
                          <a href="javascript:;" id="step6-btn" class="btn mybtn2 mr-3">{{ $langg->lang757 }}</a>
                          @endif
                          <button type="submit" id="final-btn" class="btn mybtn2">{{ $langg->lang776 }}</button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------- End Tab 4 ---------------->

            </div>
          </div>


          <input type="hidden" id="shipping-cost" name="shipping_cost" value="0">
          <input type="hidden" id="packing-cost" name="packing_cost" value="0">
          <input type="hidden" name="dp" id="dp" value="{{$digital}}">
          <input type="hidden" id="tax-cost" name="tax" value="0">
          <input type="hidden" name="totalQty" value="{{$totalQty}}">
          <input type="hidden" id="shipping" name="shipping" value="">
          <input type="hidden" id="curr_pos" name="curr_pos" value="{{$gs -> currency_format}}">
          <input type="hidden" id="curr_sign" name="curr_sign" value="{{ $curr->sign }}">
          <input type="hidden" id="select-country" name="country">



          @if(Session::has('coupon_total'))
          <input type="hidden" name="total" id="grandtotal" value="{{ $totalPrice }}">
          @elseif(Session::has('coupon_total1'))

          @if (strpos(Session::get('coupon_total1'), 'S.R') !== false)
          <input type="hidden" name="total" id="grandtotal"
            value="{{floatval(str_replace('S.R', '', Session::get('coupon_total1') ))}}">

          @elseif ((strpos(Session::get('coupon_total1') , 'R.S') !== false))
          <input type="hidden" name="total" id="grandtotal"
            value="{{floatval(str_replace('R.S', '', Session::get('coupon_total1') ))}}">

          @else
          <input type="hidden" name="total" id="grandtotal"
            value="{{floatval(str_replace('$', '', Session::get('coupon_total1') ))}}">
          @endif

          @else
          <input type="hidden" name="total" id="grandtotal" value="{{round($totalPrice * $curr->value,2)}}">
          @endif


          <input type="hidden" name="coupon_code" id="coupon_code"
            value="{{ Session::has('coupon_code') ? Session::get('coupon_code') : '' }}">
          <input type="hidden" name="coupon_discount" id="coupon_discount" value="{{ Session::has('coupon') ? Session::get('
              ') : '' }}">
          <input type="hidden" name="coupon_id" id="coupon_id"
            value="{{ Session::has('coupon') ? Session::get('coupon_id') : '' }}">
          <input type="hidden" name="user_id" id="user_id"
            value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->id : '' }}">



        </form>

      </div>
      <!---------------- End Form Div------------------>

      @if(Session::has('cart'))
      <div class="col-lg-4">
        <div class="right-area" style="position: fixed; width: 284px;">
          <div class="order-box">
            <h4 class="title">{{ $langg->lang127 }}</h4>
            <ul class="order-list">
              <li>
                <p>
                  {{ $langg->lang128 }}
                </p>
                <P>
                  <b
                    class="cart-total">{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}</b>
                </P>
              </li>


              @if(Session::has('coupon'))


              <li class="discount-bar">
                <p>
                  {{ $langg->lang145 }} <span
                    class="dpercent">{{ Session::get('coupon_percentage') == 0 ? '' : '('.Session::get('coupon_percentage').')' }}</span>
                </p>
                <P>
                  @if($gs->currency_format == 0)
                  <b id="discount">{{ $curr->sign }}{{ Session::get('coupon') }}</b>
                  @else
                  <b id="discount">{{ Session::get('coupon') }}{{ $curr->sign }}</b>
                  @endif
                </P>
              </li>

              @else

              <li class="discount-bar d-none">
                <p>
                  {{ $langg->lang145 }} <span class="dpercent"></span>
                </p>
                <P>
                  <b id="discount">{{ $curr->sign }}{{ Session::get('coupon') }}</b>
                </P>
              </li>

              @endif

            </ul>

            <div class="total-price">
              <p>
                {{ $langg->lang131 }}
              </p>
              <p>

                @if(Session::has('coupon_total'))
                @if($gs->currency_format == 0)
                <span id="total-cost">{{ $curr->sign }}{{ $totalPrice }}</span>
                @else
                <span id="total-cost">{{ $totalPrice }}{{ $curr->sign }}</span>
                @endif

                @elseif(Session::has('coupon_total1'))
                <span id="total-cost"> {{ Session::get('coupon_total1') }}</span>
                @else
                <span id="total-cost">{{ App\Models\Product::convertPrice($totalPrice) }}</span>
                @endif

              </p>
            </div>
            @if($digital == 0)
            <div id="ship-price" class="d-none">
              <p>
                {{ $langg->lang773 }}
              </p>
              <p>
                @if($gs->currency_format == 0)
                <span>{{ $curr->sign }}</span><span class="shipping-price">0</span>
                @else
                <span class="shipping-price">0</span><span>{{ $curr->sign }}</span>
                @endif

              </p>
            </div>
            @endif

            <div id="tax-price" class="d-none">
              <p>
                {{ $langg->lang130 }}
              </p>
              <p>
                @if($gs->currency_format == 0)
                <span>{{ $curr->sign }}</span><span class="tax">0</span>
                @else
                <span class="tax">0</span><span>{{ $curr->sign }}</span>
                @endif

              </p>
            </div>


            <div class="cupon-box">

              <div id="coupon-link">
                <img src="{{ asset('assets/front/images/tag.png') }}">
                {{ $langg->lang132 }}
              </div>

              <form id="check-coupon-form" class="coupon">
                <input type="text" placeholder="{{ $langg->lang133 }}" id="code" autocomplete="off">
                <button type="submit">{{ $langg->lang134 }}</button>
              </form>
            </div>

            {{-- Final Price Area Start--}}
            <div class="final-price">
              <span>{{ $langg->lang767 }} :</span>
              @if(Session::has('coupon_total'))
              @if($gs->currency_format == 0)
              <span id="final-cost">{{ $curr->sign }}{{ $totalPrice }}</span>
              @else
              <span id="final-cost">{{ $totalPrice }}{{ $curr->sign }}</span>
              @endif

              @elseif(Session::has('coupon_total1'))
              <span id="final-cost"> {{ Session::get('coupon_total1') }}</span>
              @else
              <span id="final-cost">{{ App\Models\Product::convertPrice($totalPrice) }}</span>
              @endif

            </div>
            {{-- Final Price Area End --}}

          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
<!-- Check Out Area End-->

@if(isset($checked))

<!-- LOGIN MODAL -->
<div class="modal fade" id="comment-log-reg1" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="comment-log-reg-Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-label="Close">
          <a href="{{ url()->previous() }}"><span aria-hidden="true">&times;</span></a>
        </button>
      </div>
      <div class="modal-body">
        <nav class="comment-log-reg-tabmenu">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab"
              aria-controls="nav-log" aria-selected="true">
              {{ $langg->lang197 }}
            </a>
            <a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab"
              aria-controls="nav-reg" aria-selected="false">
              {{ $langg->lang198 }}
            </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
            <div class="login-area">
              <div class="header-area">
                <h4 class="title">{{ $langg->lang172 }}</h4>
              </div>
              <div class="login-form signin-form">
                @include('includes.admin.form-login')
                <form id="loginform" action="{{ route('user.login.submit') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-input">
                    <input type="email" name="email" placeholder="{{ $langg->lang173 }}">
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-input">
                    <input type="password" class="Password" name="password" placeholder="{{ $langg->lang174 }}">
                    <i class="icofont-ui-password"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="left">
                      <input type="hidden" name="modal" value="1">
                      <input type="checkbox" name="remember" id="mrp" {{ old('remember') ? 'checked' : '' }}>
                      <label for="mrp">{{ $langg->lang175 }}</label>
                    </div>
                    <div class="right">
                      <a href="{{ route('user-forgot') }}">
                        {{ $langg->lang176 }}
                      </a>
                    </div>
                  </div>
                  <input id="authdata" type="hidden" value="{{ $langg->lang177 }}">
                  <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
                  @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check ==
                  1)
                  <div class="social-area">
                    <h3 class="title">{{ $langg->lang179 }}</h3>
                    <p class="text">{{ $langg->lang180 }}</p>
                    <ul class="social-links">
                      @if(App\Models\Socialsetting::find(1)->f_check == 1)
                      <li>
                        <a href="{{ route('social-provider','facebook') }}">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      @endif
                      @if(App\Models\Socialsetting::find(1)->g_check == 1)
                      <li>
                        <a href="{{ route('social-provider','google') }}">
                          <i class="fab fa-google-plus-g"></i>
                        </a>
                      </li>
                      @endif
                    </ul>
                  </div>
                  @endif
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
            <div class="login-area signup-area">
              <div class="header-area">
                <h4 class="title">{{ $langg->lang181 }}</h4>
              </div>
              <div class="login-form signup-form">
                @include('includes.admin.form-login')
                <form id="registerform" action="{{route('user-register-submit')}}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-input">
                    <input type="text" class="User Name" name="name" placeholder="{{ $langg->lang182 }}">
                    <i class="icofont-user-alt-5"></i>
                  </div>

                  <div class="form-input">
                    <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}">
                    <i class="icofont-email"></i>
                  </div>

                  <div class="form-input">
                    <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}">
                    <i class="icofont-phone"></i>
                  </div>

                  <div class="form-input">
                    <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}">
                    <i class="icofont-location-pin"></i>
                  </div>

                  <div class="form-input">
                    <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}">
                    <i class="icofont-ui-password"></i>
                  </div>

                  <div class="form-input">
                    <input type="password" class="Password" name="password_confirmation"
                      placeholder="{{ $langg->lang187 }}">
                    <i class="icofont-ui-password"></i>
                  </div>

                  @if($gs->is_capcha == 1)

                  <ul class="captcha-area">
                    <li>
                      <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i
                          class="fas fa-sync-alt pointer refresh_code "></i></p>
                    </li>
                  </ul>

                  <div class="form-input">
                    <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}">
                    <i class="icofont-refresh"></i>
                  </div>

                  @endif

                  <input id="processdata" type="hidden" value="{{ $langg->lang188 }}">
                  <button type="submit" class="submit-btn">{{ $langg->lang189 }}</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LOGIN MODAL ENDS -->

@endif

<script type="text/javascript">
  var mainurl = "{{url('/')}}";
  var gs      = {!! json_encode($gs) !!};
  var langg    = {!! json_encode($langg) !!};
</script>

	<!-- jquery -->
	<script src="{{asset('assets/front/js/jquery.js')}}"></script>
	<script src="{{asset('assets/front/jquery-ui/jquery-ui.min.js')}}"></script>
	<!-- popper -->
	<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- plugin js-->
	<script src="{{asset('assets/front/js/plugin.js')}}"></script>

  <script src="{{asset('assets/front/js/xzoom.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.hammer.min.js')}}"></script>
  <script src="{{asset('assets/front/js/setup.js')}}"></script>
	
	<script src="{{asset('assets/front/js/toastr.js')}}"></script>
	<!-- main -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>
	<!-- custom -->
	<script src="{{asset('assets/front/js/custom.js')}}"></script>

	<script src="{{asset('assets/front/js/custom-selectbox.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>


<script type="text/javascript">

    $('#track-form').on('submit',function(e){
        e.preventDefault();
        var code = $('#track-code').val();
        $('.submit-loader').removeClass('d-none');
        $('#track-order').load('{{ url("order/track/") }}/'+code,function(response, status, xhr){
	      if(status == "success")
	      {
	            $('.submit-loader').addClass('d-none');
	      }
    	});
    });


</script>

    {!! $seo->google_analytics !!}
	
  @if($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
      {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
  @endif


<script type="text/javascript">
var coup = 0;
var regex = /[+-]?\d+(\.\d+)?/g;

pos = '{{ $gs -> currency_format }}';

$('.address .col-lg-4').on('click', function() {
  $(this).addClass('active').siblings().removeClass('active');
})

$('#new-add').on('click', function() {
  $("#shipingPhone_number").val('');

  $('#select-country').val(0);
 
  var imgUrl = '{{ URL::asset("assets/images/flag_imges/worldwide.jpg") }}';
    
  $('.shipping_country-select-box li').html("") ;
  $('.shipping_country-select-box li').append('<img src="'+ imgUrl
    +'" data-value="0"/><span> ' + '{{ $langg->lang157 }}' + ' </span>');

  $('.city').html("") ;
  $('.city').append('<option value="0">{{ $langg->lang158 }}</option>');


  $('#shipping_city option:selected').removeAttr('selected');
  $("#shipping_address").val('');
  $("#shippingPostal_code").val('');
  $("#ship-area").html('');
  $(".shipping-price").html(0);
  $(".shipping-cost").val(0);
  var ftotal = $('#grandtotal').val();

  if (pos == 0) {
    $('#final-cost').html('{{ $curr->sign }}' + ftotal)
  } else {
    $('#final-cost').html(ftotal + '{{ $curr->sign }}')
  }
})

if ('{{$first_order->customer_zip}}') {
  var custCtryId = '{{$first_order->customer_country}}';
  var custCityId = '{{$first_order->customer_city}}';
} else {
  var custCtryId = 0;
  var custCityId = 0;
}

$('#old-add').on('click', function() {
  var city = $(this).closest(".row").find("#shipping_data");
  var custCtryId = '{{$first_order->customer_country}}';
  var custCityId = '{{$first_order->customer_city}}';

  $("#shipingPhone_number").val('{{ $first_order->customer_phone }}');
  $("#shipping_address").val('{{ $first_order->customer_address }}');
  $("#shippingPostal_code").val('{{ $first_order->customer_zip }}');

  var crtName = '{{$country->name_ar}}';
  var crtImg = '{{$country->art_image}}';
  var imgUrl = '{{ URL::asset("assets/images") }}' + '/' + crtImg;
  
  $('.shipping_country-select-box li').html("") ;
  $('.shipping_country-select-box li').append('<img src="'+ imgUrl
    +'" data-value="'+ custCtryId +'"/><span> ' + crtName + ' </span>');

  $('#shipping_city').val(custCityId);

  $('#select-country').val(custCtryId);

  $("#ship-area").html("");
  $(".shipping-price").html(0);
  $(".shipping-cost").val(0);
  var ftotal = $('#grandtotal').val();

  if (pos == 0) {
    $('#final-cost').html('{{ $curr->sign }}' + ftotal)
  } else {
    $('#final-cost').html(ftotal + '{{ $curr->sign }}')
  }

  var dp = $("#dp").val();
  var current_lang = $("#current_lang").val();
  var label = langg.lang158;
  city.html("");

  var cu = '{{ $curr -> sign }}';
  if (custCityId != '') {
    $.ajax({
      type: "GET",
      url: mainurl + "/checkout/get-shipping-method",
      data: {
        cityId: custCityId,
        countryId: custCtryId,
      },
      success: function(data) {
        $.each(data.methods, function(key, value) {
          var img = '{{ URL::asset("assets/images/shipping") }}' + '/' + value.image;
          $("#ship-area").append(
            '<div class="cc-selector-2">' +
            '<input type="radio" class="shipping" id="free-shepping' +
            value.id +
            '" name="shipping_method" choose="' + value.title + '" value="' +
            Number(parseFloat(value.price).toFixed(2)) +
            '"><label class="w-100 drinkcard-cc" for = "free-shepping' + value.id +
            '"><div class="row"><div class="col-sm-2 d-flex align-items-center"><span class="ship-img" style="background-image: url(\'' +
            img + '\');">' +
            '</span></div><div class="col-sm-8"><p class="m-0 py-1 shipping_icon"><i class="fas fa-shipping-fast"></i> ' +
            value.title +
            '</p><p class="m-0 py-1"><i class="far fa-clock"></i> ' + value.subtitle +
            '</p></div><div class="col-sm-2 d-flex justify-content-end align-items-center">' +
            cu +
            Number(parseFloat(value.price).toFixed(2)) + '</div></div></div></label></div>'
          );
        });
        $("#ship-area").append('<p class="text-danger text-right" id="shipp-method-error"></p>');
        if (data.cities.length < 1 && dp == 1) {
            city.append(
              '<label for="shipping_city">' +
                label +
                ':</label><input type="text" class="form-control" name="city" value="" id="shipping_city">'
            );
          } else {
            city.append(
              '<label for="shipping_city">' +
                label +
                ':</label><select class="form-control city" id="shipping_city" name="city"><option value="0">' +
                label +
                "</option></select>"
            );
            if (current_lang == "1") {
              $.each(data.cities, function (key, value) {
                $("#shipping_city").append(
                  '<option value="' +
                    value.id +
                    '">' +
                    value.name_en +
                    "</option>"
                );
              });
            } else {
              $.each(data.cities, function (key, value) {
                $("#shipping_city").append(
                  '<option value="' +
                    value.id +
                    '">' +
                    value.name_ar +
                    "</option>"
                );
              });
            }
            $("#shipping_city").val(custCityId);
          }
      },
    });
  }
})


$(window).on('load', function() {
  var cu = '{{ $curr -> sign }}';
  if ('{{$first_order->customer_zip}}') {
    var custCtryId = '{{$first_order->customer_country}}';
    var cityId = '{{$first_order->customer_city}}';

    var crtName = '{{$country->name_ar}}';
    var crtImg = '{{$country->art_image}}';
    var imgUrl = '{{ URL::asset("assets/images") }}' + '/' + crtImg;
    
    $('.shipping_country-select-box li').html("") ;
    $('.shipping_country-select-box li').append('<img src="'+ imgUrl
    +'" data-value="'+ custCtryId +'"/><span> ' + crtName + ' </span>');
    
  } else {
    var custCtryId = 0;
    var cityId = 0;
    imgUrl = '{{ URL::asset("assets/images/flag_imges/worldwide.jpg") }}';
    $('.shipping_country-select-box li').html("") ;
    $('.shipping_country-select-box li').append('<img src="'+ imgUrl
    +'" data-value="'+ custCtryId +'"/><span> ' + '{{ $langg->lang157 }}' + ' </span>');    
  } 

  $('#shipping_city').val(cityId);
  $('#select-country').val(custCtryId);
  

  var shippingValue = 0;
  var totalValue = 0;
  var dp = $("#dp").val();
  if (dp == 0) {
    $("#ship-area").html("");
    if (cityId != 0) {      
      $.ajax({
        type: "GET",
        url: mainurl + "/checkout/get-shipping-method",
        data: {
          cityId: cityId,
          countryId: custCtryId,
        },
        success: function(data) {
          $.each(data.methods, function(key, value) {
            var img = '{{ URL::asset("assets/images/shipping") }}' + '/' + value.image;
            $("#ship-area").append(
              '<div class="cc-selector-2">' +
              '<input type="radio" class="shipping" id="free-shepping' +
              value.id +
              '" name="shipping_method" choose="' + value.title + '" value="' +
              Number(parseFloat(value.price).toFixed(2)) +
              '"><label class="w-100 drinkcard-cc" for = "free-shepping' + value.id +
              '"><div class="row"><div class="col-sm-2 d-flex align-items-center"><span class="ship-img" style="background-image: url(\'' +
              img + '\');">' +
              '</span></div><div class="col-sm-8"><p class="m-0 py-1 shippin_icon"><i class="fas fa-shipping-fast"></i> ' +
              value.title +
              '</p><p class="m-0 py-1"><i class="far fa-clock"></i> ' + value.subtitle +
              '</p></div><div class="col-sm-2 d-flex justify-content-end align-items-center">' +
              cu +
              Number(parseFloat(value.price).toFixed(2)) + '</div></div></div></label></div>'
            );
          });
          $("#ship-area").append('<p class="text-danger text-right" id="shipp-method-error"></p>');
        },
      });
    }
  }
});


/******************** Start Cart Total Checked ******************* */
var cartTotal = $(".cart-total")
  .text()
  .match(regex)
  .map(function(v) {
    return parseFloat(v);
  });

var discount = $(".dpercent").text()
if (discount != '') {
  discount = $(".dpercent").text()
    .match(regex)
    .map(function(v) {
      return parseFloat(v);
    });
} else {
  discount[0] = 0;
}

var discountValue = Number((cartTotal[0] * (discount[0] / 100)).toFixed(2));
var mainTotal = Number((cartTotal[0] - discountValue).toFixed(2));

if (discount[0]) {
  $('#grandtotal').val(mainTotal);
  if (pos == 0) {
    $('#total-cost').html('{{ $curr->sign }}' + mainTotal);
    $('#discount').html('{{ $curr->sign }}' + discountValue);
    $('#final-cost').html('{{ $curr->sign }}' + mainTotal)
  } else {
    $('#total-cost').html(mainTotal + '{{ $curr->sign }}');
    $('#discount').html(discountValue + '{{ $curr->sign }}');
    $('#final-cost').html(mainTotal + '{{ $curr->sign }}')
  }
}


/******************** End Cart Total Checked ******************* */



/********Start Get Shipping Depending On Country ***** */

$(document).on("change", "#shipping_city", function() {
  var countryId = $('#select-country').val();
  var cu = '{{ $curr -> sign }}';
  var cityId = this.value;
  var shippingValue = 0;
  var totalValue = 0;
  $("#ship-area").html("");
  $.ajax({
    type: "GET",
    url: mainurl + "/checkout/get-shipping-method",
    data: {
      cityId: cityId,
      countryId: countryId
    },
    success: function(data) {
      $.each(data.methods, function(key, value) {
        var img = '{{ URL::asset("assets/images/shipping") }}' + '/' + value.image;
        $("#ship-area").append(
          '<div class="cc-selector-2">' +
          '<input type="radio" class="shipping" id="free-shepping' +
          value.id +
          '" name="shipping_method" choose="' + value.title + '" value="' +
          Number(parseFloat(value.price).toFixed(2)) +
          '"><label class="w-100 drinkcard-cc" for = "free-shepping' + value.id +
          '"><div class="row"><div class="col-sm-2 d-flex align-items-center"><span class="ship-img" style="background-image: url(\'' +
          img + '\');">' +
          '</span></div><div class="col-sm-8"><p class="m-0 py-1 shipping_icon"><i class="fas fa-shipping-fast"></i> ' +
          value.title +
          '</p><p class="m-0 py-1"><i class="far fa-clock"></i> ' + value.subtitle +
          '</p></div><div class="col-sm-2 d-flex justify-content-end align-items-center">' +
          cu +
          Number(parseFloat(value.price).toFixed(2)) + '</div></div></div></label></div>'
        );
      });

      $("#ship-area").append('<p class="text-danger text-right" id="shipp-method-error"></p>');

      shippingValue = $("#shipping-cost").val();
      totalValue = $("#total-cost")
        .text()
        .match(regex)
        .map(function(v) {
          return parseFloat(v);
        });
      ftotal = Number((parseFloat(shippingValue) + totalValue[0]).toFixed(2));
      $('#grandtotal').val(
        totalValue[0]);

      if (pos == 0) {
        $('#final-cost').html('{{ $curr->sign }}' + ftotal)
      } else {
        $('#final-cost').html(ftotal + '{{ $curr->sign }}')
      }
    },
  });
});

/********End Get Shipping Depending On Country ******/


@if(isset($checked))

$('#comment-log-reg1').modal('show');

@endif


$('#shipop').on('change', function() {
  var val = $(this).val();
  if (val == 'pickup') {
    $('#shipshow').removeClass('d-none');
  } else {
    $('#shipshow').addClass('d-none');
  }

});


$("#check-coupon-form").on('submit', function() {
  var regex = /[+-]?\d+(\.\d+)?/g;
  var val = $("#code").val();
  var total = $("#grandtotal").val();
  var ship = 0;
  $.ajax({
    type: "GET",
    url: mainurl + "/carts/coupon/check",
    data: {
      code: val,
      total: total,
      shipping_cost: ship
    },
    success: function(data) {
      if (data == 0) {
        toastr.error(langg.no_coupon);
        $("#code").val("");
      } else if (data == 2) {
        toastr.error(langg.already_coupon);
        $("#code").val("");
      } else {

        var shippingValue = $("#shipping-cost").val();

        var taxValue = $(".tax").text();
        if (taxValue != "") {
          taxValue = $(".tax")
            .text()
            .match(regex)
            .map(function(v) {
              return parseFloat(v);
            });
        } else {
          taxValue = 0;
        }

        ftotal = parseFloat(shippingValue) + parseFloat(data[0]) + taxValue[0];

        $("#check-coupon-form").toggle();
        $(".discount-bar").removeClass('d-none');

        if (pos == 0) {
          $('#total-cost').html('{{ $curr->sign }}' + data[0]);
          $('#discount').html('{{ $curr->sign }}' + data[2]);
        } else {
          $('#total-cost').html(data[0] + '{{ $curr->sign }}');
          $('#discount').html(data[2] + '{{ $curr->sign }}');
        }
        $('#grandtotal').val(data[0]);
        $('#coupon_code').val(data[1]);
        $('#coupon_discount').val(data[2]);
        if (data[4] != 0) {
          $('.dpercent').html('(' + data[4] + ')');
        } else {
          $('.dpercent').html('');
        }

        ftotal = Number(ftotal.toFixed(2));



        if (pos == 0) {
          $('#final-cost').html('{{ $curr->sign }}' + ftotal)
        } else {
          $('#final-cost').html(ftotal + '{{ $curr->sign }}')
        }

        toastr.success(langg.coupon_found);
        $("#code").val("");
      }
    }
  });
  return false;
});

// Password Checking

$("#open-pass").on("change", function() {
  if (this.checked) {
    $('.set-account-pass').removeClass('d-none');
    $('.set-account-pass input').prop('required', true);
    $('#personal-email').prop('required', true);
    $('#personal-name').prop('required', true);
  } else {
    $('.set-account-pass').addClass('d-none');
    $('.set-account-pass input').prop('required', false);
    $('#personal-email').prop('required', false);
    $('#personal-name').prop('required', false);

  }
});

// Password Checking Ends
</script>


<script type="text/javascript">
var ck = 0;

$('#step1-form').on('submit', function(e) {
  if (ck == 0) {
    e.preventDefault();
    $('#pills-step2-tab').removeClass('disabled');
    $('#pills-step2-tab').click();

  } else {
    $('#preloader').show();
  }
});


// Step 2 btn DONE

$('#step2-btn').on('click', function() {
  $('#pills-step4-tab').removeClass('active');
  $('#pills-step3-tab').removeClass('active');
  $('#pills-step2-tab').removeClass('active');
  $('#pills-step3-tab').addClass('disabled');
  $('#pills-step4-tab').addClass('disabled');
  $('#pills-step2-tab').removeClass('disabled');
  $('#pills-step2-tab').click();
  $('#pills-step2-tab').addClass('active');
})

// Step 4 btn DONE

$('#step4-btn').on('click', function() {

  $('#pills-step3-tab').removeClass('active');
  $('#pills-step2-tab').removeClass('active');
  $('#pills-step4-tab').removeClass('active');
  $('#pills-step2-tab').addClass('disabled');
  $('#pills-step3-tab').addClass('disabled');
  $('#pills-step4-tab').removeClass('disabled');
  $('#pills-step4-tab').click();
  $('#pills-step2-tab').addClass('active');
  $("#ship-price").removeClass("d-none");
})


$('#step5-btn').on('click', function() {
  $('#pills-step3-tab').removeClass('active');
  $('#pills-step2-tab').removeClass('active');
  $('#pills-step4-tab').removeClass('active');
  $('#pills-step2-tab').addClass('disabled');
  $('#pills-step3-tab').addClass('disabled');
  $('#pills-step4-tab').removeClass('disabled');
  $('#pills-step4-tab').click();
  $('#pills-step2-tab').addClass('active');
})

$('#step6-btn').on('click', function() {
  $('#pills-step3-tab').removeClass('active');
  $('#pills-step2-tab').removeClass('active');
  $('#pills-step4-tab').removeClass('active');
  $('#pills-step2-tab').addClass('disabled');
  $('#pills-step3-tab').addClass('disabled');
  $('#pills-step4-tab').removeClass('disabled');
  $('#pills-step4-tab').click();
  $('#pills-step2-tab').addClass('active');
})

$('#step3-btn').on('click', function() {
  var customerCountry = $('#select-country').val();
  var customerCity = $('#shipping_city').val();
  var customerZip = $('#shippingPostal_code').val();
  var dp = $("#dp").val();

  console.log(customerCountry);


  if (customerCountry == '0' || customerCountry == null) {
    $('#shipp-country-error').text("!الرجاء تحديد الدولة");
  } else {
    $('#shipp-country-error').addClass('d-none');
    if (customerCity == '0' || customerCity == null) {
      $('#shipp-city-error').text(" !الرجاء تحديد المدينة");

    } else {
      $('#shipp-city-error').addClass('d-none');

      if (customerZip === '') {
        $('#shipp-zip-error').text(" !الرجاء تحديد الرمز البريدي للدولة");
      } else {
        $('#shipp-zip-error').addClass('d-none');

        if (dp == 0) {
          if ($("input[type=radio][name=shipping_method]:checked").length == 0) {
            $('#shipp-method-error').text("الرجاء إختيار طريقة الشحن");
          } else {
            $('#shipp-method-error').addClass('d-none');
            $('#pills-step3-tab').removeClass('disabled');
            $('#pills-step3-tab').click();
            $('#pills-step2-tab').addClass('active');
            $('#pills-step4-tab').addClass('active');

            shippingValue = $("#shipping-cost").val();
            totalValue = $("#total-cost")
              .text()
              .match(regex)
              .map(function(v) {
                return parseFloat(v);
              });

            ftotal = parseFloat(shippingValue) + totalValue[0];
            $('#grandtotal').val(totalValue[0]);

            var tax = ((0.025 * ftotal) + (0.27 * 3.75)).toFixed(2);

            $(".tax").html(tax);

            $("#tax-cost").val(tax);

            ftotal = parseFloat(shippingValue) + totalValue[0] + parseFloat(tax);
            ftotal = Number(ftotal.toFixed(2));



            if (pos == 0) {
              $('#final-cost').html('{{ $curr->sign }}' + ftotal)
            } else {
              $('#final-cost').html(ftotal + '{{ $curr->sign }}')
            }

            $("#tax-price").removeClass("d-none");

          }

        } else {
          $('#pills-step3-tab').removeClass('disabled');
          $('#pills-step3-tab').click();
          $('#pills-step2-tab').addClass('active');
          $('#pills-step4-tab').addClass('active');

          shippingValue = $("#shipping-cost").val();
          totalValue = $("#total-cost")
            .text()
            .match(regex)
            .map(function(v) {
              return parseFloat(v);
            });

          ftotal = parseFloat(shippingValue) + totalValue[0];
          $('#grandtotal').val(totalValue[0]);

          var tax = ((0.025 * ftotal) + (0.27 * 3.75)).toFixed(2);

          $(".tax").html(tax);

          $("#tax-cost").val(tax);

          ftotal = parseFloat(shippingValue) + totalValue[0] + parseFloat(tax);
          ftotal = Number(ftotal.toFixed(2));



          if (pos == 0) {
            $('#final-cost').html('{{ $curr->sign }}' + ftotal)
          } else {
            $('#final-cost').html(ftotal + '{{ $curr->sign }}')
          }

          $("#tax-price").removeClass("d-none");

        }

      }
    }
  }
})

$('#final-btn').on('click', function() {
  ck = 1;
})

/***** Radio shipping checked**** */


$(document).on("change", "input[type=radio][name=shipping_method]", function() {

  var shippingCost = $(this).val();
  $(".shipping-price").html(shippingCost);
  shippingValue = shippingCost.match(regex).map(function(v) {
    return parseFloat(v);
  });
  $("#shipping-cost").val(shippingValue);
  $("#shipping").val($(this).attr("choose"));

  totalValue = $("#total-cost")
    .text()
    .match(regex)
    .map(function(v) {
      return parseFloat(v);
    });
  ftotal = Number((shippingValue[0] + totalValue[0]).toFixed(2));
  $('#grandtotal').val(totalValue[0]);

  if (pos == 0) {
    $('#final-cost').html('{{ $curr->sign }}' + ftotal)
  } else {
    $('#final-cost').html(ftotal + '{{ $curr->sign }}')
  }

});

/*******************  **************** */

$(".payment").on("click", function() {
  var ref_this = $(this).attr('id');
  $('.payment-information input[name="pymt"]').prop('checked', false);
  var inp = $("#" + ref_this + " input").prop('checked', true);


  var tax = 0;

  shippingValue = $("#shipping-cost").val();

  totalValue = $("#total-cost")
    .text()
    .match(regex)
    .map(function(v) {
      return parseFloat(v);
    });

  ftotal = parseFloat(shippingValue) + totalValue[0];

  if (ref_this == 'v-pills-tab0-tab') {


    tax = ((0.025 * ftotal) + (0.27 * 3.75)).toFixed(2);

  } else if (ref_this == 'v-pills-tab1-tab') {
    tax = ((0.049 * ftotal) + (0.30 * 3.75)).toFixed(2);
  }

  $(".tax").html(tax);

  $("#tax-cost").val(tax);


  ftotal = parseFloat(shippingValue) + totalValue[0] + parseFloat(tax);

  ftotal = Number(ftotal.toFixed(2));
  $('#grandtotal').val(totalValue[0]);

  if (pos == 0) {
    $('#final-cost').html('{{ $curr->sign }}' + ftotal)
  } else {
    $('#final-cost').html(ftotal + '{{ $curr->sign }}')
  }


});

$('.payment').on('click', function() {
  $('#step1-form').prop('action', $(this).data('form'));
  $('.pay-area #v-pills-tabContent .tab-pane.fade').not($(this).attr('href')).html('');
  var show = $(this).data('show');
  if (show != 'no') {
    $('.pay-area').removeClass('d-none');
  } else {
    $('.pay-area').addClass('d-none');
  }
  $($(this).attr('href')).load($(this).data('href'));
})

$('.country').IconSelectBox(true); // isImg: boolean






</script>

</body>

</html>