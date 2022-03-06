@extends('layouts.inc.frontend') 

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            @if( $verified_purchase->count() > 0)
              <h5>You are writing review for {{ $product_check->name }}
              </h5>
              <form action="{{ url('review') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product_check->name }}">
                <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                <button type="submit" class="btn btn-primart">Submit</button>
              </form>
            @else
              <div class="alert alert-danger">
                <h5>You are not eligible to review the product</h5>
                <p>
                  For the trustworthiness of the reviews only customers who purchased the product can give review. 
                </p>
                <a href="{{ url('/') }}" class="btn btn-primary">Homepage</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
