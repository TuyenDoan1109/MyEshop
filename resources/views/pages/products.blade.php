 @extends('layouts.app')

@section('content')

 @include('layouts.breadcrumb')

    @php
        if(isset($_GET['filter']['product_color'])) {
            $filter_colors = explode(',', $_GET['filter']['product_color']);
        } else {
            $filter_colors = [];
        }

        if(isset($_GET['filter']['product_size'])) {
            $filter_sizes = explode(',', strtoupper($_GET['filter']['product_size']));
        } else {
            $filter_sizes = [];
        }

        if(isset($_GET['filter']['subcategory_id'])) {
            $filter_subcategories = explode(',', $_GET['filter']['subcategory_id']);
        } else {
            $filter_subcategories = [];
        }

        if(isset($_GET['filter']['brand_id'])) {
            $filter_brands = explode(',', $_GET['filter']['brand_id']);
        } else {
            $filter_brands = [];
        }

    @endphp

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">

                <!--Filter by Brands Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by brands</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        @foreach($brandHaveProducts as $key => $item)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox"
                                {{ in_array($item->brand_id, $filter_brands) ? 'checked' : '' }}
                                data-filters="brand"
                                class="custom-control-input brand-filter"
                                name="brand-filter"
                                value="{{$item->brand_id}}"
                                id="brand-{{$key}}"
                                >
                            <label class="custom-control-label" for="brand-{{$key}}">
                                {{$item->Brand->brand_name}}
                            </label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <!--Filter by Brands End -->

                <!--Filter by subcategories Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by subcategories</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        @foreach($subcategoryHaveProducts as $key => $item)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox"
                            {{ in_array($item->subcategory_id, $filter_subcategories) ? 'checked' : '' }}
                            data-filters="subcategory"
                            class="custom-control-input subcategory-filter"
                            name="subcategory-filter"
                            value="{{$item->subcategory_id}}"
                            id="subcategory-{{$key}}"
                            >
                            <label class="custom-control-label" for="subcategory-{{$key}}">
                                {{$item->Subcategory->subcategory_name}}
                            </label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <!--Filter by subcategories End -->

                <!--Filter by Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        @foreach($colors as $key => $item)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox"
                            {{ in_array($item->product_color, $filter_colors) ? 'checked' : '' }}
                            data-filters="color"
                            class="custom-control-input color-filter"
                            name="color-filter"
                            value="{{ucfirst($item->product_color)}}"
                            id="color-{{$key}}"
                            >
                            <label class="custom-control-label" for="color-{{$key}}">{{ucfirst($item->product_color)}}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <!--Filter by Color End -->

                <!--Filter by Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="" method="post">
                        @foreach ($sizes as $key => $item)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox"
                                {{ in_array($item->product_size, $filter_sizes) ? 'checked' : '' }}
                                data-filters="size"
                                class="custom-control-input size-filter"
                                value="{{strtoupper($item->product_size)}}"
                                id="size-{{$key}}"
                            >
                            <label class="custom-control-label" for="size-{{$key}}">{{strtoupper($item->product_size)}}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <!--Filter by Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <form>
                                        @csrf
                                        <select name="sort" id="sort">
                                            <option @if(strpos(Request::fullUrl(), 'sort=-created_at') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["sort" => "-created_at"])) }}">
                                                Latest
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'sort=product_name') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["sort" => "product_name"])) }}">
                                                Name A-Z
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'sort=-product_name') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["sort" => "-product_name"])) }}">
                                                Name Z-A
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'sort=discount_price') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["sort" => "discount_price"])) }}">
                                                Price Low to High
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'sort=-discount_price') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["sort" => "-discount_price"])) }}">
                                                Price High to Low
                                            </option>
                                        </select>
                                    </form>
                                </div>
                                <div class="btn-group ml-2">
                                    <form>
                                        @csrf
                                        <select name="limit" id="limit">
                                            <option @if(strpos(Request::fullUrl(), 'limit=10') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "10"])) }}">
                                                10
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'limit=20') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "20"])) }}">
                                                20
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'limit=30') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "30"])) }}">
                                                30
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'limit=40') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "40"])) }}">
                                                40
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'limit=100') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "100"])) }}">
                                                100
                                            </option>
                                            <option @if(strpos(Request::fullUrl(), 'limit=200') !== false) selected @endif
                                                value="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),["limit" => "200"])) }}">
                                                200
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1 product-item-ajax" data-id="{{$product->id}}">
                        <div class="product-item bg-light mb-4">
                            <div style="height: 300px" class="product-img position-relative overflow-hidden">
                                <img width="100px" height="100px" class="img-fluid w-100" src="{{asset('storage/backend/img/' . $product->image_1)}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square addWishlist"><i class="fa fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square addToCart"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="/product/{{$product->id}}">{{$product->product_name}} - {{$product->product_size}} - {{$product->product_color}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{number_format($product->discount_price)}} VNĐ</h5><h6 class="text-muted ml-2"><del>{{number_format($product->selling_price)}} VNĐ</del></h6>
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
                {{ $products->links() }}
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <script>
        $(document).ready(function() {

            // Sort
            $('#sort').on('change', function() {
                var url = $(this).val();
                if(url) {
                    window.location = url;
                }
                return false;
            });

            // Limit
            $('#limit').on('change', function() {
                var url = $(this).val();
                if(url) {
                    window.location = url;
                }
                return false;
            });

            // Filter by Price Range
            $('.price-filter').click(function() {
                var url = [], tempArray = [];
                $.each($("[data-filters='price']:checked"), function() {
                    tempArray.push($(this).val());
                });
                // alert(tempArray);
                let url1 = new URL(location.href);
                url1.searchParams.delete('filter[price_range]');

                if(tempArray.length !== 0) {
                    if((url1.href).includes('?')) {
                        url += '&filter[price_range]=' + tempArray.toString();
                        window.location.href = (url1 + url);
                    } else {
                        url += '?filter[price_range]=' + tempArray.toString();
                        window.location.href = url;
                    }
                } else {
                    window.location.href = url1;
                }
            });

            // Filter Color
            $('.color-filter').click(function() {
                var url = [], tempArray = [];
                $.each($("[data-filters='color']:checked"), function() {
                    tempArray.push($(this).val().toLowerCase());
                });

                let url1 = new URL(location.href);
                url1.searchParams.delete('filter[product_color]');

                if(tempArray.length !== 0) {
                    if((url1.href).includes('?')) {

                        url += '&filter[product_color]=' + tempArray.toString();
                        window.location.href = (url1 + url);
                    } else {
                        url += '?filter[product_color]=' + tempArray.toString();
                        window.location.href = url;
                    }
                } else {
                    window.location.href = url1;
                }

            });

            // Filter Size
            $('.size-filter').click(function() {
                var url = [], tempArray = [];
                $.each($("[data-filters='size']:checked"), function() {
                    tempArray.push($(this).val().toLowerCase());
                });

                let url1 = new URL(location.href);
                url1.searchParams.delete('filter[product_size]');

                if(tempArray.length !== 0) {
                    if((url1.href).includes('?')) {
                        url += '&filter[product_size]=' + tempArray.toString();
                        window.location.href = (url1 + url);
                    } else {
                        url += '?filter[product_size]=' + tempArray.toString();
                        window.location.href = url;
                    }
                } else {
                    window.location.href = url1;
                }
            });

            // Filter Subcategory
            $('.subcategory-filter').click(function() {
                var url = [], tempArray = [];
                $.each($("[data-filters='subcategory']:checked"), function() {
                    tempArray.push($(this).val());
                });
                // alert(tempArray);
                let url1 = new URL(location.href);
                url1.searchParams.delete('filter[subcategory_id]');

                if(tempArray.length !== 0) {
                    if((url1.href).includes('?')) {
                        url += '&filter[subcategory_id]=' + tempArray.toString();
                        window.location.href = (url1 + url);
                    } else {
                        url += '?filter[subcategory_id]=' + tempArray.toString();
                        window.location.href = url;
                    }
                } else {
                    window.location.href = url1;
                }
            });

            // Filter Brand
            $('.brand-filter').click(function() {
                var url = [], tempArray = [];
                $.each($("[data-filters='brand']:checked"), function() {
                    tempArray.push($(this).val());
                });
                // alert(tempArray);
                let url1 = new URL(location.href);
                url1.searchParams.delete('filter[brand_id]');

                if(tempArray.length !== 0) {
                    if((url1.href).includes('?')) {
                        url += '&filter[brand_id]=' + tempArray.toString();
                        window.location.href = (url1 + url);
                    } else {
                        url += '?filter[brand_id]=' + tempArray.toString();
                        window.location.href = url;
                    }
                } else {
                    window.location.href = url1;
                }
            });

        });
    </script>

@endsection
