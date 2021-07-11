@extends('app', ['page_title' => 'Home'])

@section('content')
<div class="row">
    <div class="col-12" style="padding: 0;">
        <div id="slideIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getSliderProducts() as $key => $slider_product)
                <li data-target="#slideIndicators" data-slide-to="{{ $count }}" @if ($count == 0) class="active" @endif></li>
                @php
                    $count++;
                @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getSliderProducts() as $slider_product)
                <div class="carousel-item @if ($count == 0) active @endif">
                    <div class="row" style="background-image: linear-gradient(#{{ $site->getConfiguration()->colour1 }}, #eee); padding: 100px 0;">
                        <div class="col-lg-5 offset-lg-1 text-center text-lg-left" style="color: #fff;">
                            <h1 class="font-weight-bold">{{ $slider_product->name }}</h1>
                            <p>
                                <h3>{!! nl2br($slider_product->summary) !!}</h3>
                            </p>
                            <a href="{{ route('product', $slider_product->slug()) }}" class="btn btn-lg" style="background-color: transparent; color: #fff; border: 1px solid #fff; border-radius: 0;">Buy Now</a>
                        </div>
                        <div class="col-lg-6">
                            {{ Html::image($slider_product->image_url, '', ['height' => '300px']) }}
                        </div>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slideIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slideIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-12">
                <!--<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: none !important; padding: 0;">
                    <h2 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; padding-left: 0;">Top Deals</h2>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categoryMenu1" aria-controls="categoryMenu1" aria-expanded="false" aria-label="Category Menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="categoryMenu1">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 font-weight-bold">
                            <li class="nav-item">
                                <a class="nav-link btn" href="#" style="background-color: transparent; color: #{{ $site->getConfiguration()->colour1 }}; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">VIEW ALL</a>
                            </li>
                        </ul>
                    </div>
                </nav>-->
                <h2 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; padding-left: 0;">Top Deals</h2>
                <p>Get licenses for the lowest prices</p>
            </div>
            @foreach ($site->getFeaturedProducts() as $featured_product)
            <div class="col-md-6 col-lg-4 col-xl-3" style="margin-bottom: 20px;">
                <div style="background-color: #F8F8F8; padding: 20px;">
                    <div class="text-center" style="padding: 20px 0;">
                        {{ Html::image($featured_product->logo_url, $featured_product->name, ['height' => '100px']) }}
                    </div>
                    <div class="text-center" style="background: none; padding: 10px 0; border-top: 1px solid #{{ $site->getConfiguration()->colour1 }};">
                        <h5 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }};">{{ $featured_product->name }}</h5>
                        @if($featured_product->starting_price > 0)
                            From &#x20A6;{{ number_format($featured_product->starting_price, 2) }}
                        @else
                            Best prices
                        @endif
                        <a class="btn btn-sm btn-block" href="{{ route('product', $featured_product->slug()) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #fff; border-radius: 0; margin-bottom: 5px;">View Details</a>
                        <a class="btn btn-sm btn-block" href="{{ route('plans', $featured_product->slug()) }}" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Buy Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12" style="padding: 0;">
        <div id="slideIndicators1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getCategoriesByActive(true) as $category)
                <li data-target="#slideIndicators1" data-slide-to="{{ $count }}" @if ($count == 0) class="active" @endif></li>
                @php
                    $count++;
                @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getCategoriesByActive(true) as $category)
                <div class="carousel-item @if ($count == 0) active @endif">
                    <div class="row" style="background-image: url({{ $category->image_url }}); background-repeat: no-repeat; background-size: cover; padding: 100px 0;">
                        <div class="col-lg-5 offset-lg-1 text-center text-lg-left" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour2 }}80; padding: 100px;">
                            <h2 class="font-weight-bold">{{ $category->name }}</h2>
                            <p>
                                {!! nl2br($category->summary) !!}
                            </p>
                            <a href="{{ route('category', $category->slug()) }}" class="btn" style="background-color: transparent; color: #fff; border: 1px solid #fff; border-radius: 0;">Get Started</a>
                        </div>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slideIndicators1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slideIndicators1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
        </div>
    </div>
</div>
@endsection
