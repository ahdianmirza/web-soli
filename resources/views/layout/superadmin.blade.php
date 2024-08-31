<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.superadmin.head')
</head>

<body>
    @include('layout.superadmin.header')

    @include('layout.superadmin.side')
    @yield('content')

    @include('layout.superadmin.footer')
</body>

</html>