<!DOCTYPE html>
<html >
<head>
<!-- Meta Tags Start -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ouiz Test</title>
    <link rel="stylesheet" href="{{asset('')}}crmsheet/assets/css/bootstrap.min.css" type="text/css">
    <!--<link rel="stylesheet" href="/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->

    <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
</head>
<body>

 @yield('content')
</body>
</html>
