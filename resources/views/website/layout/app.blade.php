<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel = "icon" class="img-fluid" href ="" type = "image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    @include('website.layout.style')
    @stack('styles')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
    <div class="wrapper">
        <div class="container">
            <div class="content">
                <div class="container-fluid mt-3">
                    @include('website.layout.header')
                    @yield('content')
                    @include('website.layout.footer')
                </div>
            </div>
        </div>
    </div>
@include('website.layout.script')
@stack('scripts')
</body>
</html>
