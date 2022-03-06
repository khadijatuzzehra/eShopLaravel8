@extends('layouts.inc.frontend') 

@section('content')
<div class="container my-5">
  <div class="card shadow product_data">
    @if($cartitems->count() > 0)
      <div class="card-body">
        @php $total=0; @endphp
        @foreach($cartitems as $item)
          <div class="row">
            <div class="col-md-2">
              <img src="{{asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Image Here">
            </div>
            <div class="col-md-5">
              <h4>{{ $item->products->name }}</h4>
            </div>
            <div class="col-md-3">
              <input type="hidden" class="prod_id">
              @if($item->products->qty>=$item->prod_qty)
                <label for="Quantity">Quantity</label>
                <div style="width:130px;" class="input-group text-center mb-3">
                  <input type="number" name="quantity" class="form-control qty-input text-center" value="1">
                </div>
              
                @php $total=$total + $item->products->selling_price; @endphp
              @else
                <h6>Out of Stock</h6>
              @endif
            </div>
            <div class="col-md-2">
              <a href="{{ url('remove/'.$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </div>
          </div>
          
        @endforeach
      </div>
      <div class="card-footer">
        <h6>{{ $total }}</h6>
        <a href="{{ url ('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
      </div>
    @else
      <div class="card-body text-center">
        <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
        <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
      </div>
    @endif
  </div>
</div>
@endsection