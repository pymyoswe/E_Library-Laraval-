<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{URL::to('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{URL::to('bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('bootstrap/js/jquery.js')}}" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
@include('partial/navBar')
@yield('content')


<script src="{{URL::to('bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{URL::to('bootstrap/js/jquery.js')}}" type="text/javascript"></script>

</body>
</html>