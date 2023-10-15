<script src="{{asset('assets/js/vendor.min.js') }}"></script>
<script src="{{asset('assets/js/app.min.js') }}"></script>

<script src="{{asset('assets/js/pages/form-wizard.init.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include the jQuery Toast Plugin from a CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>


@if(session('success'))
    <script>
        $.toast({
            heading: 'Success',
            text: '{{ session('success') }}',
            position: 'top-right',
            loader: false,
            bgColor: '#28a745',
        });
    </script>
@endif

@if(session('warning'))
    <script>
        $.toast({
            heading: 'Warning',
            text: '{{ session('warning') }}',
            position: 'top-right',
            loader: false,
            bgColor: '#99cc33',
        });
    </script>
@endif


@if(session('danger'))
    <script>
        $.toast({
            heading: 'Error',
            text: '{{ session('danger') }}',
            position: 'top-right',
            loader: false,
            bgColor: 'red',
        });
    </script>
@endif


@if(session('error'))
    <script>
        $.toast({
            heading: 'Error',
            text: '{{ session('error') }}',
            position: 'top-right',
            loader: false,
            bgColor: 'red',
        });
    </script>
@endif