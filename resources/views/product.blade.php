@extends('master')
@section('content')
    <div class="container custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($products as $product)
                <div class="item {{ $product['id'] == 3 ? 'active' : ''}}">
                    <img src="{{ $product->gallery }}" class="slider-img">
                    <div class="carousel-caption slider-text">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="trending-wrapper">
            <h3>Trending Products</h3>
            <?php
              $productsCount = count($products);
            ?>
            @foreach($products as $product)
            <div class="trending-item" style="width: {{ 100 / $productsCount }}%">
                <img src="{{ $product->gallery }}" class="trending-image">
                <div class="">
                    <h3>{{ $product->name }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
