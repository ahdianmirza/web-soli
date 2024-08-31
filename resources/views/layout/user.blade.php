<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.user.head')
</head>

<body>
    @include('layout.user.header')

    @include('layout.user.side')
    @yield('content')

    @include('layout.user.footer')
</body>

</html>