@extends('layouts.front')
@section('content')


<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
        <div class="col-lg-8">
					<div class="user-profile-details">
						<div class="order-history">
							<div class="header-area">
								<h4 class="title">
									{{ $langg->lang277 }}
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ $langg->lang278 }}</th>
														<th>{{ $langg->lang279 }}</th>
														<th>{{ $langg->totalq1 }}</th>
														<th>{{ $langg->paymentstat22 }}</th>
														<th>{{ $langg->lang280 }}</th>                                                        
														<th>{{ $langg->lang281 }}</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													 @foreach($orders as $order)
													<tr>
														<td>
																{{$order->order_number}}
														</td>
														<td style='text-align: left;direction: ltr;'>
																{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}
														</td>
														<td style="text-align: center;">
																{{$order->totalQty}}
														</td>
														<td>
														<div class="payment-status ">
															@if($order->payment_status == 'Pending') 
															  <div class='Pending'><i class="bi bi-x"></i></div>
															@elseif($order->payment_status == 'Completed ') 
															  <div class='Completed '><i class="bi bi-check"></i></div>
															@endif
														{{$order->payment_status == 'Pending' ? "$langg->unpaid2222":"$langg->paid00011"}}
														</div>
														</td>

                										<td>
															
																{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}
														</td>

														<td>
															<div class="order-status {{ $order->status }}">
                                                                @if($langg->rtl == "1")
                                                                
                                                                
                                                                @if($order->status == "pending")
																 <div class='riv'><i class="bi bi-journal-text"></i></div>
                                                                    في انتظار المراجعة
                                                                @elseif($order->status == "processing")
																<div class='riv'><i class="bi bi-journal-text"></i></div>
                                                                    جاري معالجة الطلب
                                                                @elseif($order->status == "completed")
																<div class='Completed '><i class="bi bi-check"></i></div>
                                                                    مكتمل
                                                                
                                   
                                                                @else
																	{{ucwords($order->status)}}
                                                                @endif
                                                                @else
																	{{ucwords($order->status)}}

                                                                @endif
															</div>
														</td>
														<td>
															<a href="{{route('user-order',$order->id)}}">
																	{{ $langg->lang283 }}
															</a>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection