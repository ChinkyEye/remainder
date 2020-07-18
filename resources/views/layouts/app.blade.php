<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REMAINDER</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/summernote.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/alertify.min.css">
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/nepali.datepicker.v2.2.min.css">


    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                 <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
        </div>
    </section>
    @include('layouts.footer')
</div>

<!-- jQuery -->
<script src="{{url('/')}}/backend/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/backend/js/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/backend/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/backend/js/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/')}}/backend/js/tempusdominus-bootstrap-4.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('/')}}/backend/js/jquery.overlayScrollbars.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/backend/js/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/backend/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/backend/js/dashboard.js"></script>
<script type="text/javascript" src="{{url('/')}}/backend/js/nepali.datepicker.v2.2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datepicker').nepaliDatePicker({
            ndpEnglishInput: 'englishDate1'
        });
        $('#nepaliDate').nepaliDatePicker({
            ndpEnglishInput: 'englishDate'
        });
    });
</script> 
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

</body>
</html>


