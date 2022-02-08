<!DOCTYPE HTML>
<html>

<!-- Mirrored from pophonic.com/_wizard-143062221/organic/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Apr 2021 07:31:52 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>@yield('title')</title>

<!--Bootstrap Element and Grid System-->
<link href="{{asset('fontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css">

<!--Main Elements CSS-->
<link href="{{asset('fontend/css/style.css')}}" rel="stylesheet" type="text/css">

<!--Font Awesome-->
<link href="{{asset('fontend/fonts/font-awesome-4.3.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

<!--OWL Carousel CSS-->
<link href="{{asset('fontend/bower_components/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('fontend/bower_components/owl.carousel/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css">

<!--FlexSlider CSS-->
<link href="{{asset('fontend/bower_components/FlexSlider/flexslider.css')}}" rel="stylesheet" type="text/css">

<!--Megafolio CSS-->
<link href="{{asset('fontend/bower_components/megafolio/css/settings.css')}}" rel="stylesheet" type="text/css">

<!--FancyBox CSS-->
<link href="{{asset('fontend/bower_components/fancybox/jquery.fancybox8cbb.css?v=2.1.5')}}" rel="stylesheet" type="text/css">

<!--jQuery Fullpage CSS-->
<link href="{{asset('fontend/css/jquery.fullPage.css')}}" rel="stylesheet" type="text/css">

<!--Tootips CSS-->
<link href="{{asset('fontend/bower_components/tooltipster/css/tooltipster.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('fontend/bower_components/tooltipster/css/themes/tooltipster-shadow.css')}}" rel="stylesheet" type="text/css">

<!--Tabulous CSS-->
<link href="{{asset('fontend/bower_components/tabulous/tabulous.css')}}" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300%7COpen+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>

<!--Color Scheme Setting-->
<link href="{{asset('fontend/css/color.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('fontend/toastr.min.css')}}">
</head>

<body>

<!--Page Loader-->

<!--End-->

<!--Main Menu Wrapper Start-->
{{-- <div id="main-menu" class="left">

	<!--Menu Burger-->
    <div class="nav-open">
        <a href="#" class="nav-btn" data-action="open">
        	<div class="burger-wrap">
                <div class="menu-burger">
                    <div class="menu1"></div>
                    <div class="menu2"></div>
                    <div class="menu3"></div>
                </div>
            </div>
        </a>
    </div>
    
    <!--Sidebar Navigation Start-->
	<div class="sidebar-nav">
    	<div class="nav-inner-wrap">
    	
            <!--Menu Close-->
            <div class="nav-close">
                <a href="#" class="nav-btn" data-action="close">
                    <div class="menu-close">
                        <div class="menu1"></div>
                        <div class="menu2"></div>
                    </div>
                </a>
            </div>
            
            <!--Logo Start-->
            <div class="logo">
                <a href="index.html">
                    <img src="images/logo.png" alt="logo" />
                </a>
            </div>
            <!--Logo End-->
            
            <!--Navigation Menu Start-->
            <nav>
                <ul class="nav-menu">
                    <li data-menuanchor="panelBlock1"><a href="index.html#panelBlock1">Home</a></li>
                    <li data-menuanchor="panelBlock2"><a href="index.html#panelBlock2">About Us</a></li>
                    <li data-menuanchor="panelBlock3"><a href="index.html#panelBlock3">Services</a></li>
                    <li data-menuanchor="panelBlock4"><a href="index.html#panelBlock4">Products</a></li>
                    <li data-menuanchor="panelBlock5"><a href="index.html#panelBlock5">Blog</a></li>
                    <li data-menuanchor="panelBlock6"><a href="index.html#panelBlock6">Special Offer</a></li>
                    <li data-menuanchor="panelBlock7"><a href="index.html#panelBlock7">Contact Us</a></li>
                    <li class="active"><a href="#">Pages</a>
                        <ul>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="products.html">Products</a>
                                <ul>
                                    <li><a href="product-single01.html">Product Single</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog-single01.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="columns.html">Columns</a></li>
                            <li><a href="elements.html">Elements</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!--Navigation Menu End-->
		
		</div>
    </div>
    <!--Sidebar Navigation End-->
    
</div> --}}

@include('fontend.common.header')
<!--Main Menu Wrapper End-->

<div id="fullpage" class="fullpageDisable"></div>

<!--Container Wrapper Start-->
<div class="container-wrapper">
	

    
  
    @yield('content')
    <!--Single Page Footer Start-->
    {{-- <div class="page-footer dark" data-bg-color="#111111" data-image-src="images/upload/footer-bg-image.jpg">
    	<div class="fit-screen-wrap">
            <div class="container">
                <div class="page-footer-wrap">
                    
                    <div data-height="30"></div>
                    
                    <!--Footer Logo-->
                    <div class="footer-logo animate-fadeIn">
                        <a href="#"><img src="images/upload/footer-logo.png" alt="footer logo" /></a>
                    </div>
                    
                    <div data-height="80"></div>
                    
                    <!--Footer Description-->
                    <div class="footer-description animate-fadeIn">
                        Sed fringilla <span data-color="#00e676">egestas morbi</span> condimentum
                    </div>
                    <div data-height="35"></div>
                    <div class="footer-subdescription animate-fadeIn">
                        Lorem ipsum dolor sit amet consectetur adipiscing<br>mauris magna lacinia purus quis.
                    </div>
                    
                    <div data-height="80"></div>
                    
                    <div class="animate-fadeIn">
                    
                        <!--Footer Social Media-->
                        <div class="social-media">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        
                        <!--Copyright-->
                        <div class="copyright">
                            Copyrights © 2015 <a href="#">Wizard</a>. All Rights Reserved.
                        </div>
                    
                    </div>
                
                </div>
            </div>
        </div>
        <div class="overlay" data-bg-color="#111111" data-opacity="0.8"></div>
    </div> --}}

    @include('fontend.common.footer')
    <!--Single Page Footer End-->

</div>
<!--Container Wrapper End-->

<!--jQuery files-->
<script type="text/javascript" src="{{asset('fontend/js/vendor/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/js/vendor/jquery.easings.min.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/js/vendor/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/js/jquery.viewport.js')}}"></script>

<!--jQuery Retina-->
<script type="text/javascript" src="{{asset('fontend/js/retina.js')}}"></script>

<!--jQuery Sidebar-->
<script type="text/javascript" src="{{asset('fontend/js/jquery.sidebar.min.js')}}"></script>

<!--jQuery FitVids-->
<script type="text/javascript" src="{{asset('fontend/js/jquery.fitvids.js')}}"></script>

<!--jQuery OWL-Carousel-->
<script type="text/javascript" src="{{asset('fontend/bower_components/owl.carousel/owl.carousel.min.js')}}"></script>

<!--jQuery FlexSlider-->
<script type="text/javascript" src="{{asset('fontend/bower_components/FlexSlider/jquery.flexslider.js')}}"></script>

<!--jQuery Megafolio-->
<script type="text/javascript" src="{{asset('fontend/bower_components/megafolio/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/bower_components/megafolio/js/jquery.themepunch.megafoliopro.js')}}"></script>

<!--jQuery FancyBox-->
<script type="text/javascript" src="{{asset('fontend/bower_components/fancybox/jquery.fancybox.pack8cbb.js?v=2.1.5')}}"></script>

<!--jQuery Fullpage-->
<script type="text/javascript" src="{{asset('fontend/js/jquery.fullPage.min.js')}}"></script>

<!--jQuery Midnight-->
<script type="text/javascript" src="{{asset('fontend/js/midnight.jquery.min.js')}}"></script>

<!--jQuery Tooltips-->
<script type="text/javascript" src="{{asset('fontend/bower_components/tooltipster/js/jquery.tooltipster.min.js')}}"></script>

<!--jQuery Tabulous-->
<script type="text/javascript" src="{{asset('fontend/bower_components/tabulous/tabulous.js')}}"></script>

<!--Custom js file-->
<script type="text/javascript" src="{{asset('fontend/js/custom.js')}}"></script>

<script type="" src="{{asset('fontend/toastr.min.js')}}"></script>

@yield('footer')


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

</body>

<!-- Mirrored from pophonic.com/_wizard-143062221/organic/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Apr 2021 07:31:56 GMT -->
</html>
