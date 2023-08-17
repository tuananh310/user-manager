<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-body-image="none">
<head>
    <meta charset="utf-8">
    <title>Nhựa Tiền Phong</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dashboard Admin HTML Template" name="description">
    <meta content="Nhựa Tiền Phong" name="author">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('css/bootstrap.css', "statics/assets") }}">
    <link rel="stylesheet" href="{{ mix('css/icons.css', "statics/assets") }}">
    <link rel="stylesheet" href="{{ mix('css/app.css', "statics/assets") }}">
    @yield('css')
</head>
<body>
<div id="layout-wrapper">
    @yield('content')
</div>
@if(session('error'))
    <script>
        window._NOTIFY = {
            type: 'error',
            content: '{{ session('error') }}',
        }
    </script>
@endif

@if(session('warning'))
    <script>
        window._NOTIFY = {
            type: 'warning',
            content: '{{ session('warning') }}',
        }
    </script>
@endif
<script src="{{ asset('core/js/bootstrap.bundle.min.js') }}"></script>
@yield('script')
</body>
</html>
