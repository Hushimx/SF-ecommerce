@extends('layouts.load')

@section('content')

<div class="content-area">

  <div class="add-product-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-description">
          <div class="body-area">
            @include('includes.admin.form-error')
            <form id="geniusformdata" action="{{route('admin-shipping-create')}}" method="POST"
              enctype="multipart/form-data">
              {{csrf_field()}}

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Title') }} *</h4>
                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <input type="text" class="input-field" name="title" placeholder="{{ __('Title') }}" required=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">Country *</h4>
                  </div>
                </div>
                <div class="col-lg-7">
                  <select class="input-field" name="country_id" required="" id="country">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name_ar}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">City *</h4>
                  </div>
                </div>
                <div class="col-lg-7" id="shipping_data">
                  <select class="input-field" name="city_id[]" required="" id="city" multiple>
                    <option value="0">City</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Duration') }} *</h4>
                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <input type="text" class="input-field" name="subtitle" placeholder="{{ __('Duration') }}" required=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Price') }} *</h4>
                    <p class="sub-heading">({{ __('In') }} {{ $sign->name }})</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <input type="number" class="input-field" name="price" placeholder="{{ __('Price') }}" required=""
                    value="" min="0" step="0.1">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Feature Image') }} *</h4>
                  </div>
                </div>
              </div>


              <input type="file" name="file" value="" accept="image/*">

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">

                  </div>
                </div>
                <div class="col-lg-7">
                  <button class="addProductSubmit-btn" type="submit">{{ __('Create') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection