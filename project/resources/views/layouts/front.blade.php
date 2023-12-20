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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	
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
	
	<!--arabic font new edit-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
	<!--end-->

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

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '395185322360443');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=395185322360443&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Snap Pixel Code -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

snaptr('init', '27750610-e9a3-4fc5-b606-f57d5fd339f8', {
    'user_email': '_INSERT_USER_EMAIL_'
});

snaptr('track', 'PAGE_VIEW');
snaptr('track', 'PURCHASE');

</script><!-- End Snap Pixel Code -->
</head>

<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86947678, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86947678" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
@if($gs->is_loader == 1)
 @if(isset($sliders))
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif
@endif

@if($gs->is_popup== 1)

@if(isset($visited))
    <div style="display:none">
        <img src="{{asset('assets/images/'.$gs->popup_background)}}">
    </div>

    <!--  Starting of subscribe-pre-loader Area   -->
    <div class="subscribe-preloader-wrap" id="subscriptionForm" style="display: none;">
        <div class="subscribePreloader__thumb" style="background-image: url({{asset('assets/images/'.$gs->popup_background)}});">
            <span class="preload-close"><i class="fas fa-times"></i></span>
            <div class="subscribePreloader__text text-center">
                <h1>{{$gs->popup_title}}</h1>
                <p>{{$gs->popup_text}}</p>
                <form action="{{route('front.subscribe')}}" id="subscribeform" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="email" name="email"  placeholder="{{ $langg->lang741 }}" required="">
                        <button id="sub-btn" type="submit">{{ $langg->lang742 }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Ending of subscribe-pre-loader Area   -->

@endif

@endif


	<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 remove-padding">
					<div class="content">
						<div class="left-content">
							<div class="list">
								<ul>
									<?php  $host = $_SERVER['HTTP_HOST']; ?>

									@if($gs->is_language == 1)
									<li>
										<div class="language-selector">
											<i class="fas fa-globe-americas"></i>
											<select name="language" class="language selectors nice">
										@foreach(DB::table('languages')->get() as $language)
										@if($host == "www.en.soft-fire.com" or $host == "en.soft-fire.com")
										<option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('languages')->where('language','=','English')->first()->id == $language->id ? 'selected' : '') }} >{{$language->language}}</option>
                                        @else
										<option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('languages')->where('is_default','=',1)->first()->id == $language->id ? 'selected' : '') }} >{{$language->language}}</option>
										@endif								
										@endforeach
											</select>
										</div>
									</li>
									@endif

									@if($gs->is_currency == 1)
									<li>
										<div class="currency-selector">
											<i class="fas fa-dollar-sign"></i>
										<select name="currency" class="currency selectors nice">
										@foreach(DB::table('currencies')->get() as $currency)
											<option value="{{route('front.currency',$currency->id)}}" {{ Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : (DB::table('currencies')->where('is_default','=',1)->first()->id == $currency->id ? 'selected' : '') }} >{{$currency->name}}</option>
										@endforeach
										</select>
										</div>
									</li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Top Header Area End -->


	<!-- Logo Header Area Start -->
	<section class="logo-header navdrop " style="padding-top: 14px;" >
		<div class="container">
			<div class="row head justify-content-evenly">
				<div class="remove-padding">
					<div class=" logo logo-edit">
						<a href="{{ route('front.index') }}">
                            @if($langg->rtl == "0")
							<img src="{{asset('assets/images/'.$gs->logo)}}" alt="" >
                            @else
                            <img src="{{asset('assets/images/rtllogoAR.png')}}" alt="">
                            @endif
						</a>
					</div>
				</div>
				<!--new menu NewEdit-->
				
				<div class="search-menu-big col" style="display: inline-flex;">
				    <form action="{{ route('front.search') }}" method="GET" class="search-fade-form">
						<input   name="search" style="width: 450px;height: 35px;background: none;" placeholder="{{ $langg->lang2 }}" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}" required="" autocomplete="off" >
						<button type="submit" style="max-width: 80px;height: 35px;" class="btn btn-primary" ><i class="icofont-search-1"></i> </button>

						<div class="icon-big"  style="display: inline-flex;margin:  0 20px ;">
						

							@if(!Auth::guard('web')->check())
											<a href="{{ route('user.login') }}" role="button" class="icon" >
												<i class="bi bi-person" ></i>
												</a>
								@else
											<div class="icon" type="button" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton" data-toggle="dropdown">
												<i class="bi bi-person" ></i>
											</div>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			
												<a class="dropdown-item" href="{{ route('user-dashboard') }}">{{ $langg->lang221 }}</a>
			
												<a class="dropdown-item" href="{{ route('user-profile') }}">{{ $langg->lang205 }}</a>
												<a class="dropdown-item" href="{{ route('user-logout') }}">{{ $langg->lang223 }}</a>
											</div>
			
								@endif
								
								&nbsp;&nbsp;&nbsp;
							<a href="javascript:;" class="cart carticon" data-toggle="modal" data-target="#cart-model">
								<div class="icon">
									<i class="bi bi-cart3"></i>
									<span class="cart-quantity" id="cart-count">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
								</div>
							</a>
							&nbsp;&nbsp;&nbsp;
							@if(Auth::guard('web')->check())
									<a href="{{ route('user-wishlists') }}" >
										<i class="bi bi-heart" ></i>
									</a>
								@else
									<a href="javascript:;" data-toggle="modal" id="wish-btn" data-target="#comment-log-reg" >
										<i class="bi bi-heart"></i>
									</a>
								@endif
							</div>
							   
							</div>
					</form>
					 <br>

				
					<div class="icon-slide-menu "  >
						
						
					   
					

						<div style="display: inline-flex;" >
							@if(!Auth::guard('web')->check())
										<a href="{{ route('user.login') }}" role="button" class="icon" >
											<i class="bi bi-person" style="font-size: 22px;margin: 0 13px;"></i>
											</a>
							@else
										<div class="icon" type="button" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton" data-toggle="dropdown">
											<i class="bi bi-person" style="font-size: 22px;margin: 0 13px;"></i>
										</div>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	
											<a class="dropdown-item" href="{{ route('user-dashboard') }}">{{ $langg->lang221 }}</a>
	
											<a class="dropdown-item" href="{{ route('user-profile') }}">{{ $langg->lang205 }}</a>
											<a class="dropdown-item" href="{{ route('user-logout') }}">{{ $langg->lang223 }}</a>
										</div>
	
							@endif
							<i class="bi bi-search"></i>
							&nbsp;&nbsp;&nbsp;
						<a href="javascript:;" class="cart carticon" data-toggle="modal" data-target="#cart-model">
							<div class="icon">
								<i class="bi bi-cart3"></i>
								<span class="cart-quantity" id="cart-count">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
							</div>
						</a>
                        &nbsp;&nbsp;&nbsp;
                        <i class="bi bi-list" style="font-size: 22px;"></i>
						</div>
					</div>
					
				
                 
				
				
				
				<!--end new menu-->
				
			</div>
		</div>
		<div class="main-navigation d-flex justify-content-center">

			<ul>
				@php  
					$i=1;
				@endphp
				
				@foreach($categories as $category)				

					<li class="{{count($category->subs) > 0 ? 'first':''}} {{ $i >= 15 ? 'rx-child' : '' }}">								
						<a href="{{ route('front.category',$category->slug) }}"> 
							@if($langg->rtl == 1)
								{{ $category->name }}
							@endif
							@if($langg->rtl == 0)
								{{ $category->name2 }}
							@endif
							@if(count($category->subs) > 0)
							&nbsp;
							<i class="bi bi-caret-down-fill"></i>
							@endif
						</a>											

						@if(count($category->subs) > 0)
							@php  
							$ck = 0;
							foreach($category->subs as $subcat) {
								if(count($subcat->childs) > 0) {
									$ck = 1;
									break;
								}
							}
							@endphp

							<ul class="{{ $ck == 1 ? 'categories_mega_menu' : 'categories_mega_menu column_1' }}">
								@foreach($category->subs as $subcat)
									<li>
										<a href="{{ route('front.subcat',['slug1' => $subcat->category->slug, 'slug2' => $subcat->slug]) }}">
											@if($langg->rtl == 1)
												{{ $subcat->name }}
											@endif
											@if($langg->rtl == 0)
												{{ $subcat->name2 }}
											@endif
										</a>
										@if(count($subcat->childs) > 0)
											<div class="categorie_sub_menu">
												<ul>
													@foreach($subcat->childs as $childcat)
													<li><a href="{{ route('front.childcat',['slug1' => $childcat->subcategory->category->slug, 'slug2' => $childcat->subcategory->slug, 'slug3' => $childcat->slug]) }}">
													@if($langg->rtl == 1)
														{{ $childcat->name }}
													@endif
													@if($langg->rtl == 0)
														{{ $childcat->name2 }}
													@endif
													</a></li>
													@endforeach
												</ul>
											</div>
										@endif
									</li>
								@endforeach
							</ul>
						@endif
					</li>						
				@endforeach
				
			</ul>
		</div>
	</section>
	<!-- Logo Header Area End -->

    <!--slide menu newedit-->
    <div class="slide-menu-container" ></div>
         <div class="slide-menu-rtl-new" >
			<form action="{{ route('front.search') }}" method="GET" style="display: inline-flex;width: 100% !important;box-shadow: 0 4px 2px -2px rgba(128, 128, 128, 0.3);">
				<input class="search-slide-menu" style="padding: 18px 8px;" name="search" placeholder="{{ $langg->lang2 }}" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}" required="" autocomplete="off" >
				<button class="btn-slide-menu" type="submit"><i class="icofont-search-1"></i></button>
			</form>
			 <ul>
			 @php  
				$i=1;
			 @endphp
					
			 @foreach($categories as $category)				

					<li >	
						    <div class="slide-menu-cat">							
							<a  href="{{ route('front.category',$category->slug) }}" > 
								@if($langg->rtl == 1)
								{{ $category->name }}
								@endif
								@if($langg->rtl == 0)
								{{ $category->name2 }}
								@endif
							</a>	
                            </div>										

					</li>	
					
					@if(count($category->subs) > 0)
									@php  
									$ck = 0;
									foreach($category->subs as $subcat) {
										if(count($subcat->childs) > 0) {
											$ck = 1;
											break;
										}
									}
									@endphp
	
									<ul class="slide-menu-cat2">
										@foreach($category->subs as $subcat)
											<li>
												<a href="{{ route('front.subcat',['slug1' => $subcat->category->slug, 'slug2' => $subcat->slug]) }}">
													@if($langg->rtl == 1)
													
														{{ $subcat->name }}
													@endif
													@if($langg->rtl == 0)
													
														{{ $subcat->name2 }}
													@endif
												</a>
											</li>
										@endforeach
									</ul>
								@endif
					@endforeach
		     </ul>

			 <br>
			 
			 <div class="helpfullinks  remove-padding order-lg-last">
				<div class="container">
					<ul class="row" style="text-align: center !important;font-size: 19px !important;">
						<li class="col">
							<a href="javascript:;" class="cart carticon" data-toggle="modal" data-target="#cart-model">
									<i class="bi bi-cart3" ></i>
							</a>
						</li>
						<li class="col">
							@if(Auth::guard('web')->check())
								<a href="{{ route('user-wishlists') }}" class="wish">
									<i class="bi bi-heart" ></i>
								</a>
							@else
								<a href="javascript:;" data-toggle="modal" id="wish-btn" data-target="#comment-log-reg" class="wish">
									<i class="bi bi-heart"></i>
								</a>
							@endif
						</li>
						
					</ul>
				</div>
			 
			</div>
			

			 
	     </div>
    
	<!--end slide menu-->
	<!--icons for big screen new edit-->
        <div class="icons-ch" style='display: none;'> 
		
				
			    <div class="fictec">
					<center>
						<a href="javascript:;" class="cart carticon" data-toggle="modal" data-target="#cart-model">
							<div class="icon">
								<i class="bi bi-cart3"></i>
								<span class="cart-quantity" id="cart-count">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
							</div>
						</a>
			    	</center>
				</div>
				<div class="fictec totop" style="display: block;">
					<center>
			        <a href="#"  id="toTop">
						<i class="bi bi-arrow-up-circle"></i>
				    </a>
			    	</center>
				</div>
		
		</div>

	<!--end icons-->
	<!--search fade newedit-->
	<div class="modal fade" id="searchfade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
		<form action="{{ route('front.search') }}" method="GET" class="search-fade-form">
	  <input   name="search" placeholder="{{ $langg->lang2 }}" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}" required="" autocomplete="off" >
	  <button type="submit" class="btn btn-primary" ><i class="icofont-search-1"></i> </button>
	   </form>
	  </div>
	  

    </div>
  </div>
</div>

	<!--end search -->
	  
   
@yield('content')

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="footer-info-area">
						<div class="footer-logo">
							<a href="{{ route('front.index') }}" class="logo-link">
                                @if($langg->rtl=='0')
								<img src="{{asset('assets/images/'.$gs->logo)}}" alt="">
                                @else
                                <img src="{{asset('assets/images/Logo7844.png')}}" alt="">
                                @endif
							</a>
						</div>
						<div class="text">
							<p>
									  @if($langg->rtl == "1")
								
									  {!! $gs->footer !!}
								@else
                               Welcome to SoftFire, In SoftFire We offer a lot of latest games with low prices , We have multiple payment methods to make our customers payment becomes much easier , Customer satisfaction is our goal , In SoftFire we do our best to provide the best offers for our customers .

@endif
							</p>
						</div>
					</div>
					<div class="fotter-social-links">
						<ul>

                               	     @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->g_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->gplus }}" class="google-plus" target="_blank">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->t_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->l_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" class="linkedin" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->d_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" class="dribbble" target="_blank">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                      </li>
                                      @endif
									  <a href="https://maroof.sa/168470" target="_blank"><img src="{{asset('assets/images/maroof.png')}}" style="width: 100px; height: 51px; margin-top: -14px;"></img></a>


						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-2">
					<div class="footer-widget info-link-widget">
						<h4 class="title">
								{{ $langg->lang21 }}
						</h4>
						<ul class="link-list">
							<li>
								<a href="{{ route('front.index') }}">
									{{ $langg->lang22 }}
								</a>
							</li>
                            
							@foreach(DB::table('pages')->where('footer','=',1)->get() as $data)
							<li >
								<a href="{{ route('front.page',$data->slug) }}">
									@if($langg->rtl == "0")
									 @if($data->title == 'من نحن؟')
                                      About us
									 @elseif($data->title == 'الحسابات البنكية')
									Bank Account
						            @elseif($data->title == 'الشروط والاحكام')
									Terms And Conditions
									@elseif($data->title == 'السجل التجاري')
									Commercial Register
									@else
                                    {{ $data->title }}
									@endif
								    @else
                                    {{ $data->title }}
					                @endif
								</a>
							</li>
							@endforeach

							<li>
								<a href="{{ route('front.contact') }}">
									{{ $langg->lang23 }}
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="footer-widget recent-post-widget">
						<h4 class="title">
							@if($langg->rtl == "1")
							تواصل معنا
						@else
                            CONTACT US
					    @endif
						</h4>
						<ul class="post-list">
																					<li>
								<div class="post">
								  <div class="post-img">
								  </div>
								  <div class="post-details">
									<a href="mailto:info@Soft-Fire.com">
										<h4 class="post-title">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											info@Soft-Fire.com
										</h4>
									</a>
								  </div>
								</div>
							  </li>

							
														<li>
								<div class="post">
								  <div class="post-img">
								  </div>
								  <div class="post-details">
									<a href="https://wa.me/966503397713">
										<h4 class="post-title">
											<i class="fa fa-phone" aria-hidden="true"></i>
											+966503397713
										</h4>
									</a>
								  </div>
								</div>
							  </li>
							<li>
								<div class="post">
								  <div class="post-img">
								  </div>
								   <div class="post-details">
									<a >
										<h4 class="post-title">
											<i class="fa fa-map-marker"></i>
											Saudi Arabia
										</h4>
									</a>
								  </div>
								</div>
							  </li>

						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 payment-footer1">
					<div class="footer-widget info-link-widget">
						<h4 class="title" >
						{{ $langg->lang772 }}
						</h4> 
						<div class="footer-payment ">
							<center>
							<img src="{{asset('assets/images/mada.png')}}"  alt="mada">
							<img src="{{asset('assets/images/VM.png')}}"  alt="visa">
							<img src="{{asset('assets/images/pp.png')}}" alt="paypal">
							<img src="{{asset('assets/images/apay.png')}}"  alt="applepay">
						    </center>
						</div>


					</div>
				</div>

			</div>
		</div>
		
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<div class="content">
								<div class="content">
									<p>{!! $gs->copyright !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->

	<!-- Back to Top Start -->
	<!-- Back to Top End -->

<!-- LOGIN MODAL -->
	<div class="modal fade" id="comment-log-reg" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
				<nav class="comment-log-reg-tabmenu">
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab" aria-controls="nav-log" aria-selected="true">
							{{ $langg->lang197 }}
						</a>
						<a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab" aria-controls="nav-reg" aria-selected="false">
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
				            <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
				              {{ csrf_field() }}
				              <div class="form-input">
				                <input type="email" name="email" placeholder="{{ $langg->lang173 }}" required="">
				                <i class="icofont-user-alt-5"></i>
				              </div>
				              <div class="form-input">
				                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang174 }}" required="">
				                <i class="icofont-ui-password"></i>
				              </div>
				              <div class="form-forgot-pass">
				                <div class="left">
				                  <input type="checkbox" name="remember"  id="mrp" {{ old('remember') ? 'checked' : '' }}>
				                  <label for="mrp">{{ $langg->lang175 }}</label>
				                </div>
				                <div class="right">
				                  <a href="javascript:;" id="show-forgot">
				                    {{ $langg->lang176 }}
				                  </a>
				                </div>
				              </div>
				              <input type="hidden" name="modal"  value="1">
				              <input class="mauthdata" type="hidden"  value="{{ $langg->lang177 }}">
				              <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
					              @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check == 1)
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
                        <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                          {{ csrf_field() }}

                            <div class="form-input">
                                <input type="text" class="User Name" name="name" placeholder="{{ $langg->lang182 }}" required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>

                            <div class="form-input">
                                <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}" required="">
                                <i class="icofont-email"></i>
                            </div>

                            <div class="form-input">
                                <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}" required="">
                                <i class="icofont-phone"></i>
                            </div>

                            <div class="form-input">
                                <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}" required="">
                                <i class="icofont-location-pin"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password_confirmation" placeholder="{{ $langg->lang187 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>


@if($gs->is_capcha == 1)

                                    <ul class="captcha-area">
                                        <li>
                                            <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code "></i></p>
                                        </li>
                                    </ul>

                            <div class="form-input">
                                <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}" required="">
                                <i class="icofont-refresh"></i>
                            </div>


@endif

                            <input class="mprocessdata" type="hidden"  value="{{ $langg->lang188 }}">
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

<!-- VENDOR LOGIN MODAL -->
	<div class="modal fade" id="vendor-login" tabindex="-1" role="dialog" aria-labelledby="vendor-login-Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" style="transition: .5s;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<nav class="comment-log-reg-tabmenu">
					<div class="nav nav-tabs" id="nav-tab1" role="tablist">
						<a class="nav-item nav-link login active" id="nav-log-tab1" data-toggle="tab" href="#nav-log1" role="tab" aria-controls="nav-log" aria-selected="true">
							{{ $langg->lang234 }}
						</a>
						<a class="nav-item nav-link" id="nav-reg-tab1" data-toggle="tab" href="#nav-reg1" role="tab" aria-controls="nav-reg" aria-selected="false">
							{{ $langg->lang235 }}
						</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-log1" role="tabpanel" aria-labelledby="nav-log-tab">
				        <div class="login-area">
				          <div class="login-form signin-form">
				                @include('includes.admin.form-login')
				            <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
				              {{ csrf_field() }}
				              <div class="form-input">
				                <input type="email" name="email" placeholder="{{ $langg->lang173 }}" required="">
				                <i class="icofont-user-alt-5"></i>
				              </div>
				              <div class="form-input">
				                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang174 }}" required="">
				                <i class="icofont-ui-password"></i>
				              </div>
				              <div class="form-forgot-pass">
				                <div class="left">
				                  <input type="checkbox" name="remember"  id="mrp1" {{ old('remember') ? 'checked' : '' }}>
				                  <label for="mrp1">{{ $langg->lang175 }}</label>
				                </div>
				                <div class="right">
				                  <a href="javascript:;" id="show-forgot1">
				                    {{ $langg->lang176 }}
				                  </a>
				                </div>
				              </div>
				              <input type="hidden" name="modal"  value="1">
				               <input type="hidden" name="vendor"  value="1">
				              <input class="mauthdata" type="hidden"  value="{{ $langg->lang177 }}">
				              <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
					              @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check == 1)
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
					<div class="tab-pane fade" id="nav-reg1" role="tabpanel" aria-labelledby="nav-reg-tab">
                <div class="login-area signup-area">
                    <div class="login-form signup-form">
                       @include('includes.admin.form-login')
                        <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                          {{ csrf_field() }}

                          <div class="row">

                          <div class="col-lg-6">
                            <div class="form-input">
                                <input type="text" class="User Name" name="name" placeholder="{{ $langg->lang182 }}" required="">
                                <i class="icofont-user-alt-5"></i>
                            	</div>
                           </div>

                           <div class="col-lg-6">
 <div class="form-input">
                                <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}" required="">
                                <i class="icofont-email"></i>
                            </div>

                           	</div>
                           <div class="col-lg-6">
    <div class="form-input">
                                <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}" required="">
                                <i class="icofont-phone"></i>
                            </div>

                           	</div>
                           <div class="col-lg-6">

<div class="form-input">
                                <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}" required="">
                                <i class="icofont-location-pin"></i>
                            </div>
                           	</div>

                           <div class="col-lg-6">
 <div class="form-input">
                                <input type="text" class="User Name" name="shop_name" placeholder="{{ $langg->lang238 }}" required="">
                                <i class="icofont-cart-alt"></i>
                            </div>

                           	</div>
                           <div class="col-lg-6">

 <div class="form-input">
                                <input type="text" class="User Name" name="owner_name" placeholder="{{ $langg->lang239 }}" required="">
                                <i class="icofont-cart"></i>
                            </div>
                           	</div>
                           <div class="col-lg-6">

<div class="form-input">
                                <input type="text" class="User Name" name="shop_number" placeholder="{{ $langg->lang240 }}" required="">
                                <i class="icofont-shopping-cart"></i>
                            </div>
                           	</div>
                           <div class="col-lg-6">

 <div class="form-input">
                                <input type="text" class="User Name" name="shop_address" placeholder="{{ $langg->lang241 }}" required="">
                                <i class="icofont-opencart"></i>
                            </div>
                           	</div>
                           <div class="col-lg-6">

<div class="form-input">
                                <input type="text" class="User Name" name="reg_number" placeholder="{{ $langg->lang242 }}" required="">
                                <i class="icofont-ui-cart"></i>
                            </div>
                           	</div>
                           <div class="col-lg-6">

 <div class="form-input">
                                <input type="text" class="User Name" name="shop_message" placeholder="{{ $langg->lang243 }}" required="">
                                <i class="icofont-envelope"></i>
                            </div>
                           	</div>
 
                           <div class="col-lg-6">
  <div class="form-input">
                                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                           	</div>
                           <div class="col-lg-6">
 								<div class="form-input">
                                <input type="password" class="Password" name="password_confirmation" placeholder="{{ $langg->lang187 }}" required="">
                                <i class="icofont-ui-password"></i>
                            	</div>
                           	</div>

                            @if($gs->is_capcha == 1)

<div class="col-lg-6">


                            <ul class="captcha-area">
                                <li>
                                 	<p>
                                 		<img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code "></i>
                                 	</p>
                                        
                                </li>
                            </ul>


</div>

<div class="col-lg-6">

 <div class="form-input">
                                <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}" required="">
                                <i class="icofont-refresh"></i>

                            </div>


                           
                          </div>

                          @endif


                           	</div>
                          </div>

				            <input type="hidden" name="vendor"  value="1">
                            <input class="mprocessdata" type="hidden"  value="{{ $langg->lang188 }}">
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
<!-- VENDOR LOGIN MODAL ENDS -->



<!-- FORGOT MODAL -->
<div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                    <div class="login-area">
                        <div class="header-area forgot-passwor-area">
                            <h4 class="title">{{ $langg->lang191 }}  </h4>
                            <p class="text">{{ $langg->lang192 }} </p>
                        </div>
                        <div class="login-form">
                @include('includes.admin.form-login')
                            <form id="mforgotform" action="{{route('user-forgot-submit')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <input type="email" name="email" class="User Name" placeholder="{{ $langg->lang193 }}" required="">
                                    <i class="icofont-user-alt-5"></i>
                                </div>
                                <div class="to-login-page">
                                        <a href="javascript:;" id="show-login">
                                            {{ $langg->lang194 }}
                                        </a>
                                </div>
                                <input class="fauthdata" type="hidden"  value="{{ $langg->lang195 }}">
                                <button type="submit" class="submit-btn">{{ $langg->lang196 }}</button>
                            </form>
                        </div>
                    </div>

      </div>
    </div>
  </div>
</div>
<!-- FORGOT MODAL ENDS -->

<!-- Product Quick View Modal -->

	  <div class="modal fade" id="quickview" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
		  <div class="modal-content">
			<div class="submit-loader">
				<img src="{{asset('assets/images/'.$gs->loader)}}" alt="">
			</div>
			<div class="modal-header">
			  <h5 class="modal-title">{{ $langg->lang199 }}</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<div class="container quick-view-modal">

				</div>
			</div>
		  </div>
		</div>
	  </div>
<!-- Product Quick View Modal -->

<!-- Order Tracking modal Start-->
    <div class="modal fade" id="track-order-modal" tabindex="-1" role="dialog" aria-labelledby="order-tracking-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"> <b>{{ $langg->trackorder1 }}</b> </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                        <div class="order-tracking-content">
                            <form id="track-form" class="track-form">
                                {{ csrf_field() }}
                                <input type="text" id="track-code" placeholder="{{ $langg->gtc2222 }}" required="">
                                <button type="submit" class="mybtn3">{{ $langg->vt2222 }}</button>
                                <a href="#"  data-toggle="modal" data-target="#order-tracking-modal"></a>
                            </form>
                        </div>

                        <div>
				            <div class="submit-loader d-none">
								<img src="{{asset('assets/images/'.$gs->loader)}}" alt="">
							</div>
							<div id="track-order">
								
							</div>
                        </div>

            </div>
            </div>
        </div>
    </div>
<!-- Order Tracking modal End -->

<!-- Cart Modal -->
<div  class="modal fade" id="cart-model" tabindex="-1" role="dialog" aria-labelledby="cart-model-Title" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 90% !important;max-width: 350px !important; ">
		<div class="modal-content" id="modal-content-cart" >
			@include('load.cart')
		</div>
	</div>
</div><!-- Cart modal -->




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
<!--new menu-->

<script>
	$(document).ready(function(){
	

		$('.icon-slide-menu .bi-list').click(function(){
			$('.slide-menu-container').fadeIn("300") ;
			$('.slide-menu-rtl-new').delay("300").show("slide", { direction: "left" }, 250);
			$('html, body').css({
    overflow: 'hidden',
    height: '100%'
});
		});
		$('.icon-slide-menu .bi-search').click(function(){
			$('.slide-menu-container').fadeIn("300") ;
			$('.slide-menu-rtl-new').delay("300").show("slide", { direction: "left" }, 250);
            $('html, body').css({
    overflow: 'hidden',
    height: '100%'
});
		});

		$('.slide-menu-container').click(function(){
			$('.slide-menu-container').fadeOut("300") ;
			$('.slide-menu-rtl-new').hide() ;
			$('html, body').css({
    overflow: 'auto',
    height: 'auto'
});
		});

		$(window).scroll( function(){
            $('.icons-ch').fadeIn("slow") ;
		 });

	});
</script>
<!--to top-->
<script>
	$("#toTop").click(function () {
      $("html, body").animate({scrollTop: 0}, 1000);
    });
</script>





    {!! $seo->google_analytics !!}
	
  @if($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
      {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
  @endif
	@yield('scripts')


	<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-messaging.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>

	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	


	<script>
	var firebaseConfig = {
		apiKey: "AIzaSyDf9swdY3iDjzvUbIeJLc8Dn0bBT2JKA50",
		authDomain: "soft-fire-13472.firebaseapp.com",
		databaseURL: "https://soft-fire-13472.firebaseio.com",
		projectId: "soft-fire-13472",
		storageBucket: "soft-fire-13472.appspot.com",
		messagingSenderId: "17944470208",
		appId: "1:17944470208:web:9d74c717c89256118c8325",
		measurementId: "G-LZJMX9Z271"
	};
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();
	const messaging = firebase.messaging();
	messaging.usePublicVapidKey('BN7DIAqD5UbT87eLnqV8Mvk-Q6yjTi_APfxFfeTpTTt8vnHAEKQcCbybq2ekCYN3hN4c8qpv_5ZFogCL2RtcgWs');
	messaging.requestPermission().then(function(){
	console.log('Notification permission granted.');
	return messaging.getToken();
	})
	.then(function(token){
	console.log(token);
	//document.getElementById("token").innerHTML = token; 
	})
	.catch(function(err){
	console.log('Unable to get permission to notify.', err);
	})
    messaging.onMessage((payload) => {
		console.log('Message received. ', payload);
		alertify.alert(payload.notification.title, payload.notification.body, function(){  });
	});
	</script>




</body>

</html>