@extends('layouts.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col">
                <div id="header-carousel" class="carousel slide mb-5" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#slider3" data-slide-to="0"></li>
                        <li data-target="#slider3" data-slide-to="1"></li>
                        <li data-target="#slider3" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{asset('frontend/img/carousel-1.png')}}" alt="First Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('frontend/img/carousel-2.png')}}" alt="Second Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('frontend/img/carousel-3.png')}}" alt="Third Slide">
                        </div>
                    </div>
            
                    <!-- CONTROLS -->
                    <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
    
                    <a href="#slider3" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Featured Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            @foreach($featured_products as $featured_product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('storage/backend/img/' . $featured_product->image_1)}}" alt="">
                            <div class="product-action">
                                <a data-id="{{$featured_product->id}}" class="btn btn-outline-dark btn-square addWishlist" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="/product/{{$featured_product->id}}">{{$featured_product->product_name}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{number_format($featured_product->discount_price)}} VNĐ</h5><h6 class="text-muted ml-2"><del>{{number_format($featured_product->selling_price)}} VNĐ</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Featured Products End -->

    <!-- Hot Deal Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Hot Deal Products</span></h2>
        <div class="row px-xl-5">
            @foreach($hotdeal_products as $hotdeal_product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('storage/backend/img/' . $hotdeal_product->image_1)}}" alt="">
                            <div class="product-action">
                                <a data-id="{{$hotdeal_product->id}}" class="btn btn-outline-dark btn-square addWishlist" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="/product/{{$hotdeal_product->id}}">{{$hotdeal_product->product_name}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{number_format($hotdeal_product->discount_price)}} VNĐ</h5><h6 class="text-muted ml-2"><del>{{number_format($hotdeal_product->discount_price)}} VNĐ</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Hot Deal Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection