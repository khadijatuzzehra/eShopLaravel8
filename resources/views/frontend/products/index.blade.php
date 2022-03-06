@extends('layouts.inc.frontend') 

@section('content')
  <div class="py-5">
      <div class="container">
        <div class="row">
          <h2>{{ $category->name }}</h2>
            @foreach ($prod as $prod)
              <div class="col-md-3 px-4 mb-3">
                <div class="card">
                  <a href="{{ url('category/'.$category->slug.'/'.$prod->name) }}">
                    <img class="w-100 img" src="{{ asset('/assets/uploads/products/'.$prod->image) }}" alt="Product-Image">
                    <div class="card-body">
                      <h5>{{ $prod->name }}</h5>
                      <small>{{ $prod->selling_price }}</small>
                      <p> {{ $prod->small_description}}</p>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
@endsection