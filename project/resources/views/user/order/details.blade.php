@extends('layouts.front') @section('content')
<!-- User Dashbord Area Start -->
<section class="user-dashbord">
    <div class="container">
        <div class="row">
            @include('includes.user-dashboard-sidebar')
            <div class="col-lg-8">
                <div class="user-profile-details">
                    <div class="order-details">

                        <div class="process-steps-area">
                            @include('includes.order-process')

                        </div>


                        <div class="header-area">
                            <h4 class="title">
                                {{ $langg->lang284 }}
                            </h4>
                        </div>
                        <div class="view-order-page">
                            <h3 class="order-code">{{ $langg->lang285 }} {{$order->order_number}} [@if($langg->rtl == "1") @if($order->status == "pending") في انتظار المراجعة @elseif($order->status == "processing") جاري معالجة الطلب @elseif($order->status == "completed") مكتمل
                                @else {{ucwords($order->status)}} @endif @else {{ucwords($order->status)}} @endif ]
                            </h3>
                            <div class="">

                                @if($order->payment_status != "Completed")

                                <div class="" ">
                                    <div class="print-order text-danger " >
                                    <a style="margin-right: 20px; " href="https://pilot.paylink.sa/pay/info/{{$order->transaction_id}}" target="_blank" class="print-order-btn"> الدفع الان
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endif

                        <div class="">
                            <div class="print-order text-right">
                                <a href="{{route('user-order-print',$order->id)}}" target="_blank" class="print-order-btn">
                                    <i class="fa fa-print"></i> {{ $langg->lang286 }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>



                    <p class="order-date">{{ $langg->lang301 }} : {{date('d-M-Y',strtotime($order->created_at))}}
                    </p>

                    @if($order->dp == 1)

                    <div class="billing-add-area">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>{{ $langg->lang287 }}</h5>
                                <address>
                                            {{ $langg->lang288 }} : {{$order->customer_name}}<br>
                                            {{ $langg->lang289 }} : {{$order->customer_email}}<br>
                                            {{ $langg->lang290 }} : {{$order->customer_phone}}<br>
                                            {{ $langg->lang291 }} : {{$order->customer_address}}<br>
                                            {{$order->customer_city}}-{{$order->customer_zip}}
                                        </address>
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $langg->lang292 }}</h5>
                                <p>{{ $langg->lang293 }} : {{$order->currency_sign}} {{ round($order->pay_amount * $order->currency_value , 2) }}
                                </p>
                                <p>{{ $langg->lang294 }} : {{$order->method}}</p>
                                <p>{{ $langg->paymentstat22 }} : {{$order->payment_status == 'Pending' ? "$langg->unpaid2222":"$langg->paid00011"}}</p>

                                @if($order->method != "Cash On Delivery") @if($order->method=="Stripe") {{$order->method}} {{ $langg->lang295 }}
                                <p>{{$order->charge_id}}</p>
                                @endif @if($order->method=="مصرف الراجحي") {{ $langg->adapter_name }} : {{$order->adapter_name}}<br><br>{{ $langg->transfer_amount }} : {{$order->transfer_amount}}<br><br>{{ $langg->transfer_date }} : {{$order->transfer_date}}<br><br>                                @endif {{$order->method}} {{ $langg->lang296 }}
                                <p id="ttn">{{$order->txnid}}</p><a id="tid" style="cursor: pointer;">{{ $langg->lang297 }}</a> <a style="display: none; cursor: pointer;" id="tc">{{ $langg->lang298 }}</a>
                                <form id="tform">
                                    <input style="display: none; width: 100%;" type="text" id="tin" placeholder="{{ $langg->lang299 }}" required="">
                                    <input type="hidden" id="oid" value="{{$order->id}}">
                                    <button style="margin-top: 5px; display: none;" id="tbtn" type="submit" class="btn btn-default btn-sm">{{ $langg->lang300 }}</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    @else
                    <div class="shipping-add-area">
                        <div class="row">
                            <div class="col-md-6">
                                @if($order->shipping == "shipto")
                                <h5>{{ $langg->lang302 }}</h5>
                                <address>
                                            {{ $langg->lang288 }}
                                            {{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}<br>
                                            {{ $langg->lang289 }}
                                            {{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}<br>
                                            {{ $langg->lang290 }}
                                            {{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}<br>
                                            {{ $langg->lang291 }}
                                            {{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}<br>
                                            {{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}-{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}
                                        </address> @else
                                <h5>{{ $langg->lang303 }}</h5>
                                <address>
                                            {{ $langg->lang304 }} {{$order->pickup_location}}<br>
                                        </address> @endif

                            </div>
                            <div class="col-md-6">
                                <h5>{{ $langg->lang305 }}</h5>
                                @if($order->shipping == "shipto")
                                <p>{{ $langg->lang306 }}</p>
                                @else
                                <p>{{ $langg->lang307 }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="billing-add-area">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>{{ $langg->lang287 }}</h5>
                                <address>
                                            {{ $langg->lang288 }} {{$order->customer_name}}<br>
                                            {{ $langg->lang289 }} {{$order->customer_email}}<br>
                                            {{ $langg->lang290 }} {{$order->customer_phone}}<br>
                                            {{ $langg->lang291 }} {{$order->customer_address}}<br>
                                            {{$order->customer_city}}-{{$order->customer_zip}}
                                        </address>
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $langg->lang292 }}</h5>
                                <p>{{ $langg->lang293 }} {{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}
                                </p>
                                <p>{{ $langg->lang294 }} {{$order->method}}</p>

                                @if($order->method != "Cash On Delivery") @if($order->method=="Stripe") {{$order->method}} {{ $langg->lang295 }}
                                <p>{{$order->charge_id}}</p>
                                @endif @if($order->method=="مصرف الراجحي") {{ $langg->adapter_name }} : {{$order->adapter_name}}<br><br>{{ $langg->transfer_amount }} : {{$order->transfer_amount}}<br><br>{{ $langg->transfer_date }} : {{$order->transfer_date}}<br><br>                                @endif {{$order->method}} {{ $langg->lang296 }}
                                <p id="ttn">{{$order->txnid}}</p><a id="tid" style="cursor: pointer;">{{ $langg->lang297 }}</a> <a style="display: none; cursor: pointer;" id="tc">{{ $langg->lang298 }}</a>
                                <form id="tform">
                                    <input style="display: none; width: 100%;" type="text" id="tin" placeholder="{{ $langg->lang299 }}" required="">
                                    <input type="hidden" id="oid" value="{{$order->id}}">
                                    <button style="margin-top: 5px; display: none;" id="tbtn" type="submit" class="btn btn-default btn-sm">{{ $langg->lang300 }}</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    <br>




                    <div class="table-responsive">
                        <h5>{{ $langg->lang308 }}</h5>
                        <table class="table table-bordered veiw-details-table">
                            <thead>
                                <tr>
                                    <th>{{ $langg->lang309 }}</th>
                                    <th>{{ $langg->lang310 }}</th>
                                    <th>{{ $langg->lang311 }}</th>
                                    <th>{{ $langg->lang312 }}</th>
                                    <th>{{ $langg->lang313 }}</th>
                                    <th>{{ $langg->lang314 }}</th>
                                    <th>{{ $langg->lang315 }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ind=-1; ?>
                                @foreach($cart->items as $product)
                                <tr>
                                    <td>{{ $product['item']['id'] }}</td>
                                    <td>
                                        @php
                                        $prod_wock = App\Models\Product::find($product['item']['id'])->wock_product;
                                        @endphp
                                        <input type="hidden" value="{{ $product['license'] }}">
                                        <div style="display:none" class="serials">
                                        @if($prod_wock)
                                            <?php $i=1; ?>
                                <?php $ind++; ?>
                                            @for($j=0; $j<=$product['qty']-1; $j++)
                                                @if(isset($order->wock_serials[$ind]))
                                                    {{ __('The Licenes Key is') }}
                                                    @if($product['qty']>1)
                                                        {{$i}} 
                                                        <?php $i++; ?>
                                                    @endif 
                                                    :
                                                    @for($k=0; $k<count($order->wock_serials[$ind]); $k++)
                                                        @if($order->wock_serial_txt[$ind][$k]==1)
                                                            <b>{{ $order->wock_serials[$ind][$k] }}</b>
                                                            @if($k<count($order->wock_serials[$ind])-1)
                                                            ,
                                                            @endif
                                                        @else
                                                            <img width="180px" src="data:image/png;base64, {{ $order->wock_serials[$ind][$k] }}" alt="{{ $langg->lang320 }}  {{$i}}"/>
                                                        @endif
                                                    @endfor

                                                    @if($j<$product['qty']-1)
                                                        <br/>
                                                    @endif
                                                @else
                                                    {{ $langg->lang320 }} : {{ $product['license'] }}
                                                @endif
                                            @endfor
                                        @else
                                            {{ $langg->lang320 }} : {{ $product['license'] }}
                                        @endif
                                        </div>
                                        @if($product['item']['user_id'] != 0) @php $user = App\Models\User::find($product['item']['user_id']); @endphp @if(isset($user))
                                        <a target="_blank" href="{{ route('front.product', $product['item']['slug']) }}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a> @else
                                        <a target="_blank" href="{{ route('front.product', $product['item']['slug']) }}">
                                                    {{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}
                                                </a> @endif @else

                                        <a target="_blank" href="{{ route('front.product', $product['item']['slug']) }}">
                                                    {{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}
                                                </a> @endif @if($product['item']['type'] != 'Physical') @if($order->payment_status == 'Completed') @if($product['item']['file'] != null)
                                        <a href="{{ route('user-order-download',['slug' => $order->order_number , 'id' => $product['item']['id']]) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-download"></i> {{ $langg->lang316 }}
                                        </a>
                                        @else
                                        <a target="_blank" href="{{ $product['item']['link'] }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-download"></i> {{ $langg->lang316 }}
                                        </a>
                                        @endif @if($product['license'] != '')
                                        <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm btn-info product-btn" id="license"><i
                                                        class="fa fa-eye"></i> {{ $langg->lang317 }}</a> @endif @endif @endif
                                    </td>
                                    <td>{{$product['qty']}} {{ $product['item']['measure'] }}</td>
                                    <td>{{$product['size']}}</td>
                                    <td><span style="width: 40px; height: 20px; display: block; border: 10px solid {{$product['color'] == " " ? "white " : $product['color']}};"></span>
                                    </td>
                                    <td>{{$order->currency_sign}}{{round($product['item']['price'] * $order->currency_value,2)}}
                                    </td>
                                    <td>{{$order->currency_sign}}{{round($product['price'] * $order->currency_value,2)}}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="edit-account-info-div">
                            <div class="form-group">
                                <a class="back-btn" href="{{ route('user-orders') }}">{{ $langg->lang318 }}</a>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-block text-center">
                <h4 class="modal-title d-inline-block">{{ $langg->lang319 }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-center"><span id="key"></span></p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ $langg->lang321 }}</button>
            </div>
        </div>
    </div>
</div>

@endsection @section('scripts')

<script type="text/javascript">
    $('#example').dataTable({
        "ordering": false,
        'paging': false,
        'lengthChange': false,
        'searching': false,
        'ordering': false,
        'info': false,
        'autoWidth': false,
        'responsive': true
    });
</script>
<script>
    $(document).on("click", "#tid", function(e) {
        $(this).hide();
        $("#tc").show();
        $("#tin").show();
        $("#tbtn").show();
    });
    $(document).on("click", "#tc", function(e) {
        $(this).hide();
        $("#tid").show();
        $("#tin").hide();
        $("#tbtn").hide();
    });
    $(document).on("submit", "#tform", function(e) {
        var oid = $("#oid").val();
        var tin = $("#tin").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('user/json/trans')}}",
            data: {
                id: oid,
                tin: tin
            },
            success: function(data) {
                $("#ttn").html(data);
                $("#tin").val("");
                $("#tid").show();
                $("#tin").hide();
                $("#tbtn").hide();
                $("#tc").hide();
            }
        });
        return false;
    });
</script>
<script type="text/javascript">
    $(document).on('click', '#license', function(e) {
        var id = $(this).parent().find('.serials').html();
        $('#key').html(id);
    });
</script>
@endsection