@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <a href="">Filter</a>
        </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a href="ordernow" class="btn btn-success">Order Now</a><br>
            @foreach($products as $product)
              <div class="row searched-item cart-list-divider">
                  <div class="col-sm-3">
                      <a href="detail/{{ $product->id }}">
                          <img class="trending-image" src="{{ $product->gallery }}" alt="">
                      </a>
                  </div>
                  <div class="col-sm-4">
                          <div class="">
                              <h2>{{ $product->name }}</h2>
                              <h5>{{ $product->description }}</h5>
                          </div>
                  </div>
                  <div class="col-sm-3">
                    <a href="/removecart/{{ $product->cart_id }}" class="btn btn-warning">Remove from cart</a>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection
