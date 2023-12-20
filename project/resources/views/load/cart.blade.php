
          <div class="modal-header" style="background-color: white;border-bottom:  1px solid rgba(192, 192, 192, 0.6);">
              <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-shop"></i> {{ $langg->lang5 }}</h5>
              <span type="button" class="close-cart" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </span>
          </div>

          <div class="modal-body p-0">
              <center>
              <div class="container-fluid p-0 m-0">
                  @if(Session::has('cart'))
                  @foreach(Session::get('cart')->items as $product)
                  <div class="cart-load-edit" >
                    <div class="cart-load-image cart-load-inline">
                      <a href="{{ route('front.product', $product['item']['slug']) }}" >
                        <img  src="{{ $product['item']['photo'] ? filter_var($product['item']['photo'], FILTER_VALIDATE_URL) ?$product['item']['photo']:asset('assets/images/products/'.$product['item']['photo']):asset('assets/images/noimage.png') }}" alt="product">
                      </a>
                    </div>
                    <div class="cart-load-info cart-load-inline" >
                      <a href="{{ route('front.product',$product['item']['slug']) }}">
                          <h6 >{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h6>
                      </a>
                      <div class="cart-load-price">
                        <span  id="cqt{{$product['item']['id'].$product['size']}}">{{$product['qty']}}</span>
                        <span  id="prct{{$product['item']['id'].$product['size']}}">{{ App\Models\Product::convertPrice($product['item']['price']) }}</span>
                        <span>x</span>
                        </div>
                    </div>
                    <div  class=" cart-remove cart-load-remove cart-load-inline" data-class="cremove{{ $product['item']['id'].$product['size'] }}" data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size']) }}" title="Remove Product">
                        <i class="icofont-close"></i>
                      </div>
                    </div>
                    
                  @endforeach
                  @else
                  <div class="empty-cart">
                    <img style="width: 60%;max-width: 220px ;" src="{{asset('assets/images/card-empty.png')}}">					
                    <p class="mt-1 pl-3 text-center">{{ $langg->lang8 }}</p>
                    <a href="{{ route('front.index') }}" class="btn mybtn2 w-50">{{ $langg->lang778 }}</a>
                  </div>
                  
                  @endif

              </div>
            </center>
          </div>
          @if(Session::has('cart'))
              <div class="modal-footer flex-column">
                  <div class="row w-100 my-2 mx-0">
                      <div class="col-md-6 text-right mytext"><h5>{{ $langg->lang6 }}:</h5></div>

                      <div class="col-md-6 text-left myvalue">
                          <span  class="cart-total prct p-1">{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}
                          </span>
                      </div>
                  </div>
                  <div style="width:92%"><!-- End .dropdown-cart-total -->
                      <div class="cart-load-btn" style="cursor: pointer;" onclick="window.location='https://www.soft-fire.com/carts';">
                      <a   href="{{ route('front.cart') }}" style="color: black !important;">
                          {{ $langg->lang5 }}
                          </a>
                       </div>
                       <div class="cart-load-btn2" style="cursor: pointer;" onclick="window.location='https://www.soft-fire.com/checkout';">
                      <a  style="color: white !important;" href="{{ route('front.checkout') }}" >{{ $langg->lang7 }}</a>
                       </div>
                  </div>
              </div>
          @endif
