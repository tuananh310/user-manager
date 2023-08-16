<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-body-image="none">

<head>
    <meta charset="utf-8">
    <title>ChicnChill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dashboard Admin HTML Template" name="description">
    <meta content="ChicnChill" name="author">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <link rel="stylesheet" href="{{ mix('css/bootstrap.css', 'statics/assets') }}">
    <link rel="stylesheet" href="{{ mix('css/icons.css', 'statics/assets') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'statics/assets') }}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    @yield('css')
</head>

<body>
    <div id="layout-wrapper">
        @include('components.header')
        @include('components.sidebar')
        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            {{-- @include('components.footer') --}}
        </div>
    </div>
    @include('components.theme')

    @if (session('error'))
        <script>
            window._NOTIFY = {
                type: 'error',
                content: '{{ session('error') }}',
            }
        </script>
    @endif

    @if (session('warning'))
        <script>
            window._NOTIFY = {
                type: 'warning',
                content: '{{ session('warning') }}',
            }
        </script>
    @endif

    @if (session('success'))
        <script>
            window._NOTIFY = {
                type: 'success',
                content: '{{ session('success') }}',
            }
        </script>
    @endif

    <script src="{{ asset('core/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('core/js/simplebar.min.js') }}"></script>
    <script src="{{ mix('js/app.js', 'statics/assets') }}"></script>
    @yield('script')
</body>

</html>
