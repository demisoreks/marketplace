@extends('app', ['pageTitle' => 'Home'])

@section('content')
<div class="row">
    <div class="col-12" style="padding: 0;">
        <div id="slideIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slideIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#slideIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row bg-light">
                        <div class="col-lg-6 text-center text-lg-left" style="padding: 100px;">
                            <h1 class="font-weight-bold" style="color: {{ env('BRAND_COLOUR_1') }};">Product Name</h1>
                            <p>
                                <h3>{!! nl2br("Some information about the product. This is just a placeholder. Some information about the product. This is just a placeholder.") !!}</h3>
                            </p>
                            <a href="#" class="btn btn-lg rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 20px; margin-bottom: 10px;">Buy Now</a>
                            <a href="#" class="btn btn-lg rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 20px; margin-bottom: 10px;">Start Free Trial</a>
                        </div>
                        <div class="col-lg-6">
                            {{ Html::image('https://storage.googleapis.com/9cloud/campaign-word-removebg.png', '', ['width' => '100%']) }}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row bg-light">
                        <div class="col-lg-6 text-center text-lg-left" style="padding: 100px;">
                            <h1 class="font-weight-bold" style="color: {{ env('BRAND_COLOUR_1') }};">Product Name</h1>
                            <p>
                                <h3>{!! nl2br("Some information about the product. This is just a placeholder. Some information about the product. This is just a placeholder.") !!}</h3>
                            </p>
                            <a href="#" class="btn btn-lg rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 20px; margin-bottom: 10px;">Buy Now</a>
                            <a href="#" class="btn btn-lg rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 20px; margin-bottom: 10px;">Start Free Trial</a>
                        </div>
                        <div class="col-lg-6">
                            {{ Html::image('https://storage.googleapis.com/9cloud/campaign-word-removebg.png', '', ['width' => '100%']) }}
                        </div>
                    </div>
                </div>
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
    <div class="col-10 offset-1 shadow-lg p-3 mb-5" style="border-radius: 10px;">
        <div class="row" style="padding: 25px 50px;">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h2 class="font-weight-bold" style="color: {{ env('BRAND_COLOUR_1') }}; padding-left: 0;">Category Name</h2>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categoryMenu1" aria-controls="categoryMenu1" aria-expanded="false" aria-label="Category Menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="categoryMenu1">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 font-weight-bold">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">LINK 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">LINK 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">LINK 3</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div style="height: 8px; width: 120px; background-color: {{ env('BRAND_COLOUR_2') }}; margin-bottom: 20px;"></div>
            </div>
            <div class="col-12 d-none d-lg-block">
                <div id="categorySlide1" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#categorySlide1" data-slide-to="0" class="active"></li>
                        <li data-target="#categorySlide1" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12">
                                    {{ Html::image('https://images.ctfassets.net/hrltx12pl8hq/4plHDVeTkWuFMihxQnzBSb/aea2f06d675c3d710d095306e377382f/shutterstock_554314555_copy.jpg', '', ['width' => '100%']) }}
                                    <div class="slide-text">
                                        <h2>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. </h2>
                                        <a class="btn btn-lg rounded-pill" href="#" style="color: {{ env('BRAND_COLOUR_1') }}; background-color: #fff; margin-top: 20px;">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12">
                                    {{ Html::image('https://images.ctfassets.net/hrltx12pl8hq/4plHDVeTkWuFMihxQnzBSb/aea2f06d675c3d710d095306e377382f/shutterstock_554314555_copy.jpg', '', ['width' => '100%']) }}
                                    <div class="slide-text">
                                        <h2>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. </h2>
                                        <a class="btn btn-lg rounded-pill" href="#" style="color: {{ env('BRAND_COLOUR_1') }}; background-color: #fff; margin-top: 20px;">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#categorySlide1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#categorySlide1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-12" style="margin-top: 40px;">
                <h3 style="color: {{ env('BRAND_COLOUR_1') }};">Top Deals</h3>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin-top: 40px;">
                <div class="card shadow p-3 mb-5" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Product Name</h4>
                        {{ Html::image('https://storage.googleapis.com/9cloud/z_one_logo.png', '', ['height' => '80px']) }}
                        <p>This is just a brief summary of the product. This is just a brief summary of the product. This is just a brief summary of the product. </p>
                        <h4 class="font-weight-bold">&#8358;{{ number_format(1650) }}</h4>
                        <a href="#" class="btn rounded-pill" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #fff; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Buy Now</a>
                        <a href="#" class="btn rounded-pill" style="background-color: #fff; color: {{ env('BRAND_COLOUR_1') }}; border: 1px solid {{ env('BRAND_COLOUR_1') }}; margin-right: 5px; margin-bottom: 10px;">Free Trial</a>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="#">VIEW MORE</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12" style="padding: 0;">
        {{ Html::image('https://images.ctfassets.net/hrltx12pl8hq/4f6DfV5DbqaQUSw0uo0mWi/ff068ff5fc855601751499d694c0111a/shutterstock_376532611.jpg', '', ['width' => '100%']) }}
        <div class="text-center" style="position: absolute; top: 35%; justify-content: center; width: 100%">
            <h2 class="font-weight-bold text-white">Confused about what solution to adopt for your company?</h2>
            <a class="btn btn-lg rounded-pill" href="#" style="color: {{ env('BRAND_COLOUR_1') }}; background-color: #fff; margin-top: 20px;">Get Started</a>
        </div>
    </div>
</div>
@endsection
