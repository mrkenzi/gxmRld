<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
    @yield('css')
</head>
<body>

@include('parts.header')
@include('parts.navbar')
<div class="container">
    @yield('content')
</div>
@include('parts.footer')
@yield('js')
</body>
</html>