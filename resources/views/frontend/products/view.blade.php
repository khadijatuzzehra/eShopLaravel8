@extends('layouts.inc.frontend') 

@section('content')

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ url('/add-rating') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $products->id }}">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="rating-css">
              <div class="star-icon">
                  @if($user_rating)
                    @for($i=1;$i<=$user_rating->stars_rated; $i++)
                      <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating1">
                      <label for="rating{{$i}}" class="fa fa-star"></label>
                    @endfor
                    @for($j=$user_rating->stars_rated+1; $j<=5; $i++)
                      <input type="radio" value="{{ $j }}" name="product_rating" id="rating1">
                      <label for="rating{{$j}}" class="fa fa-star"></label>
                    @endfor
                  @else
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                  @endif
                  
                </div>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>




  <div class="py-3 mb-4 shadow-sm bg-info border-top">
    <div class="container">
      <h6 class="text-dark mb-0">Collections / {{$products->category->name}} / {{ $products->name }}</h6>
    </div>
  </div>
  <div class="container px-5">
    <div class="card shadow product_data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 border-right">
            <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100 px-5" alt="Product Image">
          </div>
          <div class="col-md-8">
            <h2 class="mb-0">
              {{ $products->name }}
              <label style="font-size:16px;" class="float-end badge bg-danger tending_tag"> {{ $products->trending =='1' ? 'Trending':''}}</label>
            </h2>

            <hr>
            <label class="me-3">Original Price: <s>Rs {{ $products->original_price }}</s></label>
            <label class="fw-bold">Selling Price: Rs {{ $products->selling_price }}</Rs></label>
            <div>
              @php $rateNum= number_format($rating_value) @endphp
              <span>{{ $ratings->count() }} Rating/s  </span>
              @for($i=1;$i<=$rateNum; $i++)
                <i class="fa fa-star checked" > </i>
              @endfor
            </div>
            
            <p class="mt-3">
              {{ $products->small_description}}
            </p>
            <hr>
            @if($products->qty > 0)
              <label class="row badge bg-success">In Stock</label>
            @else
              <label class="row badge bg-danger">Out of Stock</label>
            @endif
            <br>
            <div class="row mt-4">
              <div class="col-md-2">
                <input class="prod_id" type="hidden" value="{{ $products->id }}">
                <label for="Quantity">Quantity<label>
                <div class="input-group text-center mb-3">
                  <span class="input-group-text">qty:</span>
                  <input type="number" min="1" max="1" class="qty-input" name="qty-input" value="1" class="form-control" />
                  
                </div>
              </div>
              <div class="col-md-10 mt-5 mb-5">
                <br/>
                <form action="{{ url('add-to-cart') }}" method="POST">
                  @csrf
                  <input type="hidden" value="{{ $products->id }}" name="product_id">
                  <input type="hidden" value="1" name="qty">
                  @if($products->qty > 0)
                    <button type="submit" type="button" class="btn btn-primary me-3 float-start" id="addToCartButton">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                  @endif
                </form>
              </div>
              <br>
              <hr>
              <h2>Description</h2>
              <br>
              <p>{{ $products->description}}</p>

              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-link me-3 float-start"" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Rate Product
                  </button>
                </div>
                
                <div class="col-md-12">
                  <hr>
                  <label for=""><b>Zaki Abbas</b></label>
                   <br>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <small>Reviewed on 20/02/2022</small>
                   <p>Good product quality</p>
                   <label for=""><b>Rubab Zaidi</b></label>
                   <br>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star checked"></i>
                   <i class="fa fa-star"></i>
                   <small><i>Reviewed on 16/01/2022</i></small>
                   <p>The product is good and was delivered on time.</p>
</hr>
                </div>
                <form action="{{ url('review/'.$products->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <button type="submit" class="btn btn-primary mx-5">Review Product</button>
                  </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
