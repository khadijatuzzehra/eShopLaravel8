@extends('layouts.inc.frontend') 

@section('content')
  <div class="py-5">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="row">
            @foreach ($category as $cate)
            <div class="col-md-3 mb-3 px-4">
              <a href="{{ url('view-category/'.$cate->slug) }}">
                <div class="card">
                  <img src="{{ asset('/assets/uploads/category/'.$cate->image) }}" alt="Product-Image">
                  <div class="card-body">
                    <h5>{{ $cate->name }}</h5>
                    <p>{{ $cate->description }}</p>
                  </div>
                </div>
              </a>
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