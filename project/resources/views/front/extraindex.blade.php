
	@if($ps->flash_deal == 1)
		<!-- Electronics Area Start -->
		<section class="categori-item electronics-section trending">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="section-top">
							<h2 class="section-title">
								{{ $langg->lang244 }}
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
							<div class="trending-item-slider owl-carousel owl-theme owl-loaded owl3">

								@foreach($discount_products as $prod)
									@include('includes.product.flash-product')
								@endforeach
							</div>
				</div>
			</div>
		</section>
		<!-- Electronics Area start-->
	@endif

	@if($ps->large_banner == 1)
		<!-- Banner Area One Start -->
		<section class="banner-section">
			<div class="container">
				@foreach($large_banners->chunk(1) as $chunk)
					<div class="row">
						@foreach($chunk as $img)
							<div class="col-lg-12 remove-padding">
								<div class="img">
									<a class="banner-effect" href="{{ $img->link }}">
										<img src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">
									</a>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</section>
		<!-- Banner Area One Start -->
	@endif
	<section class="categori-item clothing-and-Apparel-Area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="section-top">
							<h2 class="section-title">
								{{ $langg->lang29 }}
							</h2>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
								@include('includes.product.cards')



						</div>
					</div><?php /*
					<div class="col-lg-3 remove-padding d-none d-lg-block">
						<div class="aside">
							<a class="banner-effect mb-10" href="{{ $ps->big_save_banner_link }}">
								<img src="{{asset('assets/images/'.$ps->big_save_banner)}}" alt="">
							</a>
							<a class="banner-effect" href="{{ $ps->big_save_banner_link1 }}">
								<img src="{{asset('assets/images/'.$ps->big_save_banner1)}}" alt="">
							</a>
						</div>
					</div>*/ ?>
				</div>
			</div>
			</div>
		</section>

	@if($ps->top_rated == 1)
		<!-- Electronics Area Start -->
		<section class="categori-item electronics-section trending">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="section-top">
							<h2 class="section-title">
								{{ $langg->lang28 }}
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					
                        <div class="trending-item-slider owl-carousel owl-theme owl-loaded owl3">
							@foreach($top_products as $prod)
								@include('includes.product.top-product')
							@endforeach
						</div>

						
				</div>
			</div>
		</section>
		<!-- Electronics Area start-->
	@endif
	<script>
		
          var owl2 = $('.owl2');
owl2.owlCarousel({

    loop:true,
	nav:true,
	navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'] , 
	dots:false ,
    margin:10,
    autoplay:true,
    autoplayTimeout:6000,
	smartSpeed:1000 ,
	responsive  : {
		0: {items : 1} ,
		414 : {items : 2} ,
		768 : {items : 2} ,
		992 : {items : 3} ,
		1200 : {items : 4}
	}
});

var owls = $('.owl3');
owls.owlCarousel({
	loop:true,
	nav:true,
	navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'] , 
	dots:false ,
    margin:10,
    autoplay:true,
    autoplayTimeout:6000,
	smartSpeed:1000 ,
	responsive  : {
		0: {items : 1} ,
		414 : {items : 2} ,
		768 : {items : 2} ,
		992 : {items : 3} ,
		1200 : {items : 4}
	}
});
	</script>

	@if($ps->bottom_small == 1)
		<!-- Banner Area One Start -->
		<section class="banner-section">
			<div class="container">
				@foreach($bottom_small_banners->chunk(3) as $chunk)
					<div class="row">
						@foreach($chunk as $img)
							<div class="col-lg-4 remove-padding">
								<div class="left">
									<a class="banner-effect" href="{{ $img->link }}" target="_blank">
										<img src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">
									</a>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</section>
		<!-- Banner Area One Start -->
	@endif

	@if($ps->big == 1)
		<!-- Clothing and Apparel Area Start -->
		<section class="categori-item clothing-and-Apparel-Area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="section-top">
							<h2 class="section-title">
								{{ $langg->lang29 }}
							</h2>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							@foreach($big_products as $prod)
								@include('includes.product.home-product')
							@endforeach



						</div>
					</div><?php /*
					<div class="col-lg-3 remove-padding d-none d-lg-block">
						<div class="aside">
							<a class="banner-effect mb-10" href="{{ $ps->big_save_banner_link }}">
								<img src="{{asset('assets/images/'.$ps->big_save_banner)}}" alt="">
							</a>
							<a class="banner-effect" href="{{ $ps->big_save_banner_link1 }}">
								<img src="{{asset('assets/images/'.$ps->big_save_banner1)}}" alt="">
							</a>
						</div>
					</div>*/ ?>
				</div>
			</div>
			</div>
		</section>
		<!-- Clothing and Apparel Area start-->
	@endif

	@if($ps->hot_sale == 1)
		<!-- hot-and-new-item Area Start -->
		<section class="hot-and-new-item">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="accessories-slider">
							<div class="slide-item">
								<div class="row">
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ $langg->lang30 }}
												</h2>
											</div>
											<div class="hot-and-new-item-slider">
												@foreach($hot_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach
											</div>

										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ $langg->lang31 }}
												</h2>
											</div>

											<div class="hot-and-new-item-slider">

												@foreach($latest_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ $langg->lang32 }}
												</h2>
											</div>


											<div class="hot-and-new-item-slider">

												@foreach($trending_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>

										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ $langg->lang33 }}
												</h2>
											</div>

											<div class="hot-and-new-item-slider">

												@foreach($trending_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Clothing and Apparel Area start-->
	@endif

	@if($ps->review_blog == 1)
		<!-- Blog Area Start -->
		<section class="blog-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="aside">
							<div class="slider-wrapper">
								<div class="aside-review-slider">
									@foreach($reviews as $review)
										<div class="slide-item">
											<div class="top-area">
												<div class="left">
													<img src="{{ $review->photo ? asset('assets/images/reviews/'.$review->photo) : asset('assets/images/noimage.png') }}" alt="">
												</div>
												<div class="right">
													<div class="content">
														<h4 class="name">{{ $review->title }}</h4>
														<p class="dagenation">{{ $review->subtitle }}</p>
													</div>
												</div>
											</div>
											<blockquote class="review-text">
												<p>
													{!! $review->details !!}
												</p>
											</blockquote>
										</div>
									@endforeach


								</div>
							</div>
						</div>
					</div>
					<?PHP /* <div class="col-lg-12">
						@foreach(DB::table('blogs')->orderby('views','desc')->take(2)->get() as $blogg)

							<div class="blog-box">
								<div class="blog-images">
									<div class="img">
									<a href="{{route('front.blogshow',$blogg->id)}}">
										<img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
										</a>
										<div class="date d-flex justify-content-center">
											<div class="box align-self-center">
												<p>{{date('d', strtotime($blogg->created_at))}}</p>
												<p>{{date('M', strtotime($blogg->created_at))}}</p>
											</div>
										</div>
									</div>

								</div>
								<div class="details">
									<a href='{{route('front.blogshow',$blogg->id)}}'>
										<h4 class="blog-title">
										{{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
										</h4>
									</a>
									<p class="blog-text">
										                  <?php {{substr(strip_tags($blogg->details),0,170)}} ?>

									</p>
									<a class="read-more-btn" href="{{route('front.blogshow',$blogg->id)}}">{{ $langg->lang34 }}</a>
								</div>
							</div>

						@endforeach

					</div> */ ?>
				</div>
			</div>
		</section>
		<!-- Blog Area start-->
	@endif

	@if($ps->partners == 1)
		<!-- Partners Area Start -->
		<section class="partners">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top">
							<h2 class="section-title">
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="partner-slider">
							@foreach($partners as $data)
								<div class="item-slide">
									<a href="{{ $data->link }}" target="_blank">
										<img src="{{asset('assets/images/partner/'.$data->photo)}}" alt="">
									</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Partners Area Start -->
	@endif

	<!-- main -->
	<script src="{{asset('assets/front/js/mainextra.js')}}"></script>