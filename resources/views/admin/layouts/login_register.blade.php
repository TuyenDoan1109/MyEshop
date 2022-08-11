<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <title>Login Page</title>

    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('backEnd/css/bootstrap.min.css')}}" >

    <!-- Custom CSS -->
    <link href="{{asset('backEnd/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('backEnd/css/style-responsive.css')}}" rel="stylesheet"/>

    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('backEnd/css/font.css')}}" type="text/css"/>
    <link href="{{asset('backEnd/css/font-awesome.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('backEnd/css/morris.css')}}" type="text/css"/>

    <!-- //font-awesome icons -->
    <script src="{{asset('backEnd/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('backEnd/js/raphael-min.js')}}"></script>
    <script src="{{asset('backEnd/js/morris.js')}}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            @yield('content')
        </div>
    </div>

    <script src="{{asset('backEnd/js/bootstrap.js')}}"></script>
    <script src="{{asset('backEnd/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('backEnd/js/scripts.js')}}"></script>
    <script src="{{asset('backEnd/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backEnd/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backEnd/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
