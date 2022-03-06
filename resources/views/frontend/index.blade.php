@extends('layouts.inc.frontend') 

@section('content')
  @include('layouts.inc.slider')
  <div class="py-5">
    <div class="container">
      <div class="row">
        <h2 class="mb-5">Featured Products</h2>
        <div class="owl-carousel owl-theme item row">
          @foreach ($featured_products as $prod)
          <div class="col-md-3">
            <div class="card">
              <img src=" {{ asset('/assets/uploads/products/'.$prod->image) }}" class="w-100 px-5 img"  alt="Product-Image">
              <div class="card-body">
                <h5 class="text-center">{{ $prod->name }}</h5>
                <small class="px-5 mx-5">{{ $prod->selling_price }}</small>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <div class="py-5">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
       <h2 class="mb-5">Trending Categories</h2>
        <div class="row">
            @foreach ($category as $cate)
            <div class="col-md-3 px-3">
              <div class="card">
                <img src="{{ asset('/assets/uploads/category/'.$cate->image) }}" class="w-100 mx-3 px-5 img" alt="Product-Image">
                <div class="card-body">
                  <h5 class="text-center">{{ $cate->name }}</h5>
                  <p class="px-5">{{ $cate->description }}</p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
       </div>
      </div>
    </div>
  </div>
@endsection



@section('scripts')
  <script>
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:3
          }
      }
    })
  </script>
@endsection