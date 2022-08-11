<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">

        <title>{{config('app.name', 'MyEshopAdmin')}}</title>

        <!-- vendor css -->
        <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/highlightjs/github.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">

        <!-- Tags Input CDN -->
        <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

        <!-- Starlight CSS -->
        <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
    </head>

    <body>

        <!-- ########## START: LEFT PANEL ########## -->
        <div class="sl-logo"><a href="{{route('admin.home')}}"><i class="icon ion-android-star-outline"></i> My Eshop</a></div>
        <div class="sl-sideleft">
        <div class="sl-sideleft-menu">

            <a href="{{route('admin.home')}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('category.index')}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Category</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('subcategory.index')}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Subcategory</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('brand.index')}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Brand</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">Products</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route('product.create')}}" class="nav-link">Add Product</a></li>
                <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link">All Products</a></li>
            </ul>
            
        </div><!-- sl-sideleft-menu -->

        <br>
        </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div><!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name hidden-md-down">{{ auth('admin')->user()->name }}</span>
                            <img src="{{asset('backend/img/img3.jpg')}}" class="wd-32 rounded-circle" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                                <li>
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon ion-power"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"   style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>
            </div><!-- sl-header-right -->
        </div><!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->

        <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
            @yield('content')
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->


        

        <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
        <script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
        <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
        <script src="{{asset('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
        <script src="{{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('backend/lib/d3/d3.js')}}"></script>
        <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
        <script src="{{asset('backend/lib/chart.js/Chart.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('backend/js/starlight.js')}}"></script>
        <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
        <script src="{{asset('backend/js/dashboard.js')}}"></script>
        <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>

        <script src="{{asset('/vendor/japonline/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

        @include('sweetalert::alert')

        

    </body>
</html>


