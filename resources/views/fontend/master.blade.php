<!Doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('fontend/fav.png')}}">
    <meta charset="UTF-8">
    <meta name="description" content="@yield('meta_des')">
    <meta name="keywords" content="@yield('meta_title')">
    <meta name="author" content="nexiom">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('fontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/bootstrap-v4.1.3.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/animations.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/font-awesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/reponsive.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/main.css')}}">

    <style>
        #show{
            position: relative;
            height: 458px;
            width: 459px;
            margin-left: 41px;
        }

    </style>
</head>
<body>


<!--header-part-->
 @include('fontend.common.header')




 @yield('content')

<!-- home-slider -->
 @yield('slider')

<!-- About Section -->
 @yield('about')
<!-- About Section -->



<!--Product section-->
@yield('product')
<!--Product section-->

<!--Partner section-->
 @yield('partners')
<!--Partner section-->



<!--clients section-->

@yield('client')

<!--clients section-->




<!--footer-->
@include('fontend.common.footer')
<!--./footer-->


<!-- Return to Top -->
<!-- <a href="javascript:" id="return-to-top"><i class="fas fa-arrow-alt-circle-up h4"></i></a> -->
<!-- Return to Top -->

<!--JS bootstrap-->
<script src="{{asset('fontend/js/jquery-v3.3.1.min.js')}}"></script>
<script src="{{asset('fontend/js/bootstrap-v4.1.3.min.js')}}"></script>
<script src="{{asset('fontend/js/animations.min.js')}}"></script>
<script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('fontend/js/swiper.min.js')}}"></script>
<script src="{{asset('fontend/js/counter.js')}}"></script>
<script src="{{asset('fontend/js/crbnMenu.js')}}"></script>
<script src="{{asset('fontend/js/custom-script.js')}}"></script>
<script src="{{asset('fontend/toastr.min.js')}}"></script>


<script src="{{asset('fontend/js/zoom-image.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>


@yield('footer')



<script>
    $("body").on("keyup","#searchs",function(){

        var Searchval = $(this).val();
        if(Searchval.length >0){

            $.ajax({
                url:"{{route('FilterSearchProd')}}",
                type:"get",
                data:{Searchval:Searchval},
                success:function(data){

                    $('#filterProductShow').empty().html(data);

                }
            })
        }

        if(Searchval.length <1){
            $('#filterProductShow').empty().html("");
        }
        //  console.log(val);
    })
</script>



<script>
    function ShowSearchResult(){
        $('#filterProductShow').fadeIn();
    }


    function HideSearchResult(){
        $('#filterProductShow').fadeOut();
    }
</script>


<script type="text/javascript">
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
<script>
    $('.carousel-main').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        margin: 15,
          responsive:{
          0:{
            items:1
          },
          600:{
            items:3
          },
          1000:{
            items:5
          }
        },
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>','<span class="fas fa-chevron-right fa-2x"></span>'],
    })
</script>

</body>


</html>