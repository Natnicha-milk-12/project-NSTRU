<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body style="background-color: #f5f5f5">
    @include('bar')
    <div style="padding-left: 8%; padding-right:8%;padding-top:10px;">
        @yield('content')
    </div>

</body>
@yield('script')

</html>
