
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Arkatama Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> 
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('public') }}/assetecom/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ url('public') }}/assetecom/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assetecom/css/ionicons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ url('public') }}/assetecom/css/plugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('public') }}/assetecom/style.css">
    <!-- Modernizer JS -->
    <script src="{{ url('public') }}/assetecom/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Main Wrapper Start -->
<div id="main-wrapper" class="section">
    

    @include('landing.template.header')
       
    <!-- Product Section Start-->
     @yield('content')
   <!-- Product Section End-->
       
    <!-- Footer Section Start-->
    @include('landing.template.footer')
    <!-- Footer Section End-->
    

</div><!-- Main Wrapper End -->

<!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{ url('public') }}/assetecom/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Popper JS -->
    <script src="{{ url('public') }}/assetecom/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('public') }}/assetecom/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Plugins JS -->
    <script src="{{ url('public') }}/assetecom/js/plugins.js"></script>
    <!-- Ajax Mail JS -->
    <script src="{{ url('public') }}/assetecom/js/ajax-mail.js"></script>
    <!-- Main JS -->
    <script src="{{ url('public') }}/assetecom/js/main.js"></script>
</body>

</html>
