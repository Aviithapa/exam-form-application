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
        @switch(Auth::user()->mainRole()->name)
            @case('admin')
                @include('admin.sidebar.sidebar')
            @break
            @case("applicant")
                @include('admin.sidebar.applicant')
            @break
            @case("secretary")
                @include('admin.sidebar.sachiv')
            @break
             @case("account")
                @include('admin.sidebar.accounts')
            @break
            @default
                @include('admin.sidebar.default')
        @endswitch
       
          <div class="content-page">

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                      
                         @yield('content')   
        
        
                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

            </div>
    </div>
        @include('website.layout.script')
        @stack('scripts')
</body>
</html>
