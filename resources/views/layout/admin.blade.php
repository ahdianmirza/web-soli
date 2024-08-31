<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.admin.head')
</head>

<body>
    @include('layout.admin.header')

    @include('layout.admin.side')
    @yield('content')

    @include('layout.admin.footer')
</body>

</html>