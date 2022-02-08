<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('backend/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="{{ asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="{{ asset('backend/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('backend/toastr.min.css')}}">
    <link rel="icon" href="{{asset('fontend/fav.png')}}">

    @stack('css')
</head>
<body>
<div id="wrapper">
     <!--    @if(Request::is('admin*'))
        @endif -->
            @include('backend.partial.topbar')
        <!-- /. NAV TOP  -->
        <!-- @if(Request::is('admin*'))
        @endif -->
            @include('backend.partial.sidebar')

    <!-- /. NAV SIDE  -->
        @yield('content')
    <!-- /. PAGE WRAPPER  -->
</div>

<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{ asset('backend/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ asset('backend/js/jquery.metisMenu.js')}}"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="{{ asset('backend/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('backend/js/dataTables/dataTables.bootstrap.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- CUSTOM SCRIPTS -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('files/assets/js/custom.js')}}"></script>
<script src="{{ asset('files/assets/ckeditor/ckeditor.js')}}"></script>


<script src="{{asset('backend/toastr.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@yield('footer')

<script>
$(document).on('click','#delete',function(e){
      e.preventDefault();
        var link = $(this).attr('href');

           Swal.fire({
          title: 'Are you sure?',
          text: "You want to Delete This Item!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {

           
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            window.location.href = link;
          }else{
          Swal('Safe Data');
          }
      })

    })
</script>


<script>
    @if(Session::has('message'))

var type ="{{ Session::get('alert-type','success') }}";

switch(type){
   case "success":
   toastr.success("{{ Session::get('message') }}");
   break;
   case "error":
   toastr.error("{{ Session::get('message') }}");
   break;
}

   @endif
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
