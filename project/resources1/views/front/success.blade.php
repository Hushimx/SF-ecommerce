@extends('layouts.front') @section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="pages">
          <li>
            <a href="{{ route('front.index') }}">
              {{ $langg->lang17 }}
            </a>
          </li>
          <li>
            <a href="{{ route('payment.return') }}">
              {{ $langg->lang169 }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->



@if(empty($order->paymentErrors))

<section class="tempcart">

  @if(!empty($tempcart))

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <!-- Starting of Dashboard data-table area -->
        <div class="content-box section-padding add-product-1">
          <div class="top-area">
            <div class="content">
              <div class="text-center"><i class="fas fa-check" style="color:green; font-size: 80px;"></i></div>
              <h4 class="heading">
                {{ $langg->order_title }}
              </h4>
              <p class="text">
                {{ $langg->order_text }}
              </p>
              <a href="{{route('user-order',$order->id)}}" class="link btn btn-primary">{{ $langg->lang170 }}</a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">

              <div class="product__header">
                <div class="row reorder-xs">
                  <div class="col-lg-12">
                    <div class="product-header-title">
                      <h2>{{ $langg->lang285 }} : {{$order->order_number}}</h2>
                    </div>
                  </div>
                  @include('includes.form-success')
                  <div class="col-md-12" id="tempview">
                    <div class="dashboard-content">
                      <div class="view-order-page" id="print">
                        <p class="order-date">{{ $langg->lang301 }} : {{date('Y-m-d',strtotime($order->created_at))}}
                        </p>

                        <br>
                        <div class="table-responsive">
                          <table class="table">
                            <h4 class="text-center">{{ $langg->lang308 }}</h4>
                            <thead>
                              <tr>
                                <th width="60%">{{ $langg->lang310 }}</th>
                                <th width="20%">{{ $langg->lang311 }}</th>
                                <th width="10%">{{ $langg->lang314 }}</th>
                                <th width="10%">{{ $langg->lang315 }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($tempcart->items as $product)
                              <tr>

                                <td>{{ $product['item']['name'] }}</td>
                                <td>
                                  <b></b> {{$product['qty']}} <br> @if(!empty($product['size']))
                                  <b>{{ $langg->lang312 }}</b>: {{ $product['item']['measure'] }}{{$product['size']}}
                                  <br> @endif @if(!empty($product['color']))
                                  <div class="d-flex mt-2">
                                    <b>{{ $langg->lang313 }}</b>: <span id="color-bar"
                                      style="border: 10px solid {{$product['color'] == " " ? "white " : $product['color']}};"></span>
                                  </div>
                                  @endif
                                </td>
                                <td>
                                  {{$order->currency_sign}}{{round($product['item']['price'] * $order->currency_value,2)}}
                                </td>
                                <td>{{$order->currency_sign}}{{round($product['price'] * $order->currency_value,2)}}
                                </td>
                              </tr>
                              @endforeach

                              <tr>
                                <td colspan="3"><strong>{{ $langg->lang145 }} :</strong></td>
                                @if($order->coupon_discount)
                                <td><strong>{{$order->currency_sign}}{{$order->coupon_discount}}</strong></td>
                                @else
                                <td><strong>{{$order->currency_sign}}0</strong></td>
                                @endif
                              </tr>

                              <tr>
                                <td colspan="3"><strong>{{ $langg->lang773 }} :</strong></td>
                                <td><strong>{{$order->currency_sign}}{{$order->shipping_cost}}</strong></td>
                              </tr>

                              <tr>
                                <td colspan="3"><strong>{{ $langg->lang130 }} :</strong></td>
                                <td><strong>{{$order->currency_sign}}{{$order->tax}}</strong></td>
                              </tr>

                              <tr>
                                <td colspan="3"><strong>{{ $langg->lang767 }} :</strong></td>
                                <td><strong>{{$order->currency_sign}}{{$order->pay_amount}}</strong></td>
                              </tr>



                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Ending of Dashboard data-table area -->
      </div>

      @endif

</section>
@else
<?php //{{ $order->paymentErrors['errorMessage'] }} ?>

<section class="tempcart">


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <!-- Starting of Dashboard data-table area -->
        <div class="content-box section-padding add-product-1">
          <div class="top-area">
            <div class="content">
              <i class="fas fa-exclamation-triangle text-danger" style="font-size: 165px;margin-bottom: 27px;"></i>
              <h4 class="heading text-danger">
                {{ $langg->order_title2 }}
              </h4>
              <p class="text">
                {{ $langg->order_text2 }}
              </p>

              <br>
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <a href="{{ route('front.index') }}" class="mybtn2">{{ $langg->lang170 }}</a><br>
                </div>
                <div class="col-lg-6">
                  <a href="https://pilot.paylink.sa/pay/info/{{ $order->transaction_id }}" class="mybtn2">محاولة مرة
                    اخرى</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</section>



@endif @endsection