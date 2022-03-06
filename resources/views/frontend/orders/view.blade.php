@extends('layouts.inc.frontend') 

@section('content')
<div class="container mt-5">
  <form action="{{ url('place-order') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body order-details">
            <h6>Order Details</h6>
              <label for="">First Name</label>
              <div class="border p-2">{{ $orders->fname }}</div>
              <label for="">Last Name</label>
              <div class="border p-2">{{ $orders->lname }}</div>
              <label for="">Email</label>
              <div class="border p-2">{{ $orders->email }}</div>
              <label for="">Contact</label>
              <div class="border p-2">{{ $orders->phone }}</div>
              <label for="">Shipping Adress</label>
              <div class="border p-2">
                {{ $orders->address1 }},
                {{ $orders->city }},
                {{ $orders->state }},
                {{ $orders->country}},
              </div>
              <label for="">Pin Code</label>
              <div class="border p-2">{{ $orders->pincode}}</div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
              <table class="table table-bordered table-striped">
                  <thead>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                  </thead>
                  <tbody>
                    @foreach($orders->orderitems as $item)
                      <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>1</td>
                        <td>{{ $item->price }}</td>
                        <td>
                          <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="item image"></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <h4 class="total"><i class="fa fa-money-check-alt"></i> CoD: PKR {{ $orders->total_price }}</h4>
          </div>
        </div>
      </div>
    </div>
</form>
</div>
@endsection