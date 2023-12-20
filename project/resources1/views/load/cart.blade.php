
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"><i class="icofont-cart"></i> {{ $langg->lang5 }}</h5>
              <span type="button" class="close-cart" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </span>
          </div>

          <div class="modal-body p-0">
              <div class="container-fluid p-0 m-0">
                  @if(Session::has('cart'))
                      <ul class="list-group" id="cart-items" >
                          @foreach(Session::get('cart')->items as $product)
                              <li class="product cremove{{ $product['item']['id'].$product['size'] }} list-group-item">
                                  <div class="row">
                                      <div class="col-md-3 d-flex justify-content-center align-items-center">
                                          <figure class="product-image-container m-0">
                                              <a href="{{ route('front.product', $product['item']['slug']) }}" class="product-image">
                                                  <img src="{{ $product['item']['photo'] ? filter_var($product['item']['photo'], FILTER_VALIDATE_URL) ?$product['item']['photo']:asset('assets/images/products/'.$product['item']['photo']):asset('assets/images/noimage.png') }}" alt="product">
                                              </a>
                                          </figure>
                                      </div>
                                      <div class="col-md-7 d-flex flex-column justify-content-center align-items-center">
                                          <div class="product-details">
                                              <div class="content">
                                                  <a href="{{ route('front.product',$product['item']['slug']) }}"><h6 class="product-title text-centers">{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h6></a>
                                              </div>
                                          </div><!-- End .product-details -->
                                          <p class="text-center quant mt-2 mb-0">
                                            <span class="cart-product-qty" id="cqt{{$product['item']['id'].$product['size']}}">{{$product['qty']}}</span>
                                                                                 
                                            <span class="prct p-1" id="prct{{$product['item']['id'].$product['size']}}">{{ App\Models\Product::convertPrice($product['item']['price']) }}</span>
                                            <span>x</span>
                                        </p>
                                      </div>
                                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                                          <div class="cart-remove" data-class="cremove{{ $product['item']['id'].$product['size'] }}" data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size']) }}" title="Remove Product">
                                              <i class="icofont-close"></i>
                                          </div>
                                      </div>
                                  </div>                               

                                  
                              </li><!-- End .product -->
                          @endforeach
                      </ul>						
                  @else
                  <div class="empty-cart">
                    <i class="icofont-cart-alt"></i>					
                    <p class="mt-1 pl-3 text-center">{{ $langg->lang8 }}</p>
                    <a href="{{ route('front.index') }}" class="btn mybtn2 w-50">{{ $langg->lang778 }}</a>
                  </div>
                  
                  @endif

              </div>
          </div>
          @if(Session::has('cart'))
              <div class="modal-footer flex-column">
                  <div class="row w-100 my-2 mx-0">
                      <div class="col-md-6 text-right mytext"><h5>{{ $langg->lang6 }}:</h5></div>

                      <div class="col-md-6 text-left myvalue">
                          <span class="cart-total prct p-1"">{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}
                          </span>
                      </div>
                  </div>
                  <div style="width:92%"><!-- End .dropdown-cart-total -->
                      <a class=" btn btn-secondary w-100 my-3" href="{{ route('front.cart') }}" style="font-weight: 600; font-size:14px">
                          {{ $langg->lang5 }}
                          </a>
                      <a href="{{ route('front.checkout') }}" class="btn mybtn2 w-100">{{ $langg->lang7 }}</a>
                  </div>
              </div>
          @endif
