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

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
        <div class="sl-logo"><a href="{{route('admin.dashboard')}}"><i class="icon ion-android-star-outline"></i> My Eshop</a></div>
        <div class="sl-sideleft">
        <div class="sl-sideleft-menu">

            <a href="{{route('admin.dashboard')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'admin.dashboard') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('categories.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'categories') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Category</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('subcategories.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'subcategories') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Subcategory</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('brands.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'brands') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Brand</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('products.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'products') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Products</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('admins.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'admins') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Admins</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('users.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'users') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Users</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{route('orders.index')}}" class="sl-menu-link
            @if(strpos(Request::route()->getName(), 'orders') === 0)
                active
            @endif
            ">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Orders</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

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
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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

    </body>
</html>


