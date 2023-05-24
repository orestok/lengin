<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Payment Process</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="py-5">
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="{{asset('/assets/js/jquery.payform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/app.js')}}"></script>
</body>
</html>
