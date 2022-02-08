<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img style="background: white;border-radius: 2px;padding: 8px;width: 111px;" src="{{ asset('backend/logo.png')}}" class="user-image img-responsive"/>
            </li>


            <li>
                <a class="{{ Request::is('home*') ? 'active-menu': '' }}"  href="{{ route('home') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>

            
            <li>
                <a class="{{ Request::is('admin/Menu*') ? 'active-menu': '' }}" href="#"><i class="fa fa-bars fa-3x"></i> Menu <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('MenuCreate') }}">Add New Menu</a>
                    </li>
                    <li>
                        <a href="{{route('MenuIndex')}}">All Menu</a>
                    </li>

                </ul>
            </li>

             <li>
                <a class="{{ Request::is('admin/Page*') ? 'active-menu': '' }}" href="#"><i class="fa fa-file-o fa-3x"></i> Page <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('PageCreate')}}">Add New Page</a>
                    </li>
                    <li>
                        <a href="{{route('PageIndex')}}">All Page</a>
                    </li>

                </ul>
            </li>

             <li>
                <a class="{{ Request::is('admin/Slider*') ? 'active-menu': '' }}" href="#"><i class="fa fa-sliders fa-3x"></i> Slider <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('SliderCreate')}}">Add New Slider</a>
                    </li>
                    <li>
                        <a href="{{route('SliderIndex')}}">All Slider</a>
                    </li>

                </ul>
            </li>


             {{-- <li>
                <a class="{{ Request::is('admin/Simple*') ? 'active-menu': '' }}" href="#"><i class="fa fa-sliders fa-3x"></i>Simple Slider <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('simpleSliderCreate')}}">Add Simple Slider</a>
                    </li>
                    <li>
                        <a href="{{route('simpleSliderIndex')}}">All Simple Slider</a>
                    </li>

                </ul>
            </li> --}}


             <li>
                <a class="{{ Request::is('admin/Logo*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cubes fa-3x"></i> Web Logo <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="{{route('LogoIndex')}}">Index</a>
                    </li>

                </ul>
            </li>


             <li>
                <a class="{{ Request::is('admin/About*') ? 'active-menu': '' }}" href="#"><i class="fa fa-info-circle fa-3x"></i> About <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="{{route('AboutIndex')}}">About</a>
                    </li>

                </ul>
            </li>


            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/Special*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cube fa-3x"></i> Special Offer <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{----}}
                    {{--<li>--}}
                        {{--<a href="{{route('SpecialOfferIndex')}}">Special Offer</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}



             <li>
                <a class="{{ Request::is('admin/Contact_one*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cube fa-3x"></i> Contact Us <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="{{route('ContactIndex')}}">All Contact</a>
                    </li>

                </ul>
            </li>


             <li>
                <a class="{{ Request::is('admin/Mail*') ? 'active-menu': '' }}" href="#"><i class="fa fa-comments-o fa-3x"></i> Message <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="{{route('MailIndex')}}">All Message</a>
                    </li>

                </ul>
            </li>


            {{-- <li>
                <a class="{{ Request::is('admin/Contacttow*') ? 'active-menu': '' }}" href="#"><i class="fa fa-plug fa-3x"></i> Contact Us Two<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="{{route('ContactTwoIndex')}}">All Contact</a>
                    </li>

                </ul>
            </li> --}}

             <li>
                <a class="{{ Request::is('admin/Product*') ? 'active-menu': '' }}" href="#"><i class="fa fa-life-ring fa-3x"></i> Products <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href="{{route('ProductCategoryCreate')}}">Product Category</a>
                    </li>
                    <li>
                        <a href="{{route('ProductCreate')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{route('ProductCatWiseIndex')}}">All Product</a>
                    </li>

                    {{--<li>--}}
                        {{--<a href="{{route('ProductCatWiseIndex')}}">All Cat Wise Product</a>--}}
                    {{--</li>--}}

                </ul>
            </li>


            <li>
                <a class="{{ Request::is('admin/Service*') ? 'active-menu': '' }}" href="#"><i class="fa fa-eraser fa-3x"></i> Service <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('ServiceCreate')}}">Add Service</a>
                    </li>
                    <li>
                        <a href="{{route('ServiceIndex')}}">All Serivce</a>
                    </li>

                </ul>
            </li>


            <li>
                <a class="{{ Request::is('admin/partners*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cog fa-3x"></i> Our Partners <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('ParnersIndex')}}">All Partners</a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="{{ Request::is('admin/Clients*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cogs fa-3x"></i> Our Client <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('ClientIndex')}}">All Client</a>
                    </li>

                </ul>
            </li>




{{-- 
            <li>
                <a class="{{ Request::is('admin/Consultnt*') ? 'active-menu': '' }}" href="#"><i class="fa fa-share-square-o fa-3x"></i>Oncology Consultant<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <li>
                        <a href="{{route('AllPatientCreate')}}">Add Consultnt</a>
                    </li> 
                    <li>
                        <a href="{{route('ConsultntIndex')}}">All Consultant</a>
                    </li>

                </ul>
            </li> --}}
{{-- 

            <li>
                <a class="{{ Request::is('admin/Counter*') ? 'active-menu': '' }}" href="#"><i class="fa fa-share-square-o fa-3x"></i>Counter<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                      <li>
                        <a href="{{route('AllPatientCreate')}}">Add Consultnt</a>
                    </li> 
                    <li>
                        <a href="{{route('CounterIndex')}}">Counter</a>
                    </li>

                </ul>
            </li> --}}


            <li>
                <a class="{{ Request::is('admin/News*') ? 'active-menu': '' }}" href="#"><i class="fa fa-crosshairs fa-3x"></i>News<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    {{-- <li>
                        <a href="{{route('NewsCreate')}}">Add News</a>
                    </li>  --}}
                    <li>
                        <a href="{{route('NewsIndex')}}">All News</a>
                    </li>

                </ul>
            </li>


            {{-- <li>
                <a class="{{ Request::is('admin/Supported*') ? 'active-menu': '' }}" href="#"><i class="fa fa-share-square-o fa-3x"></i>Our Supported<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href="{{route('AllPatientCreate')}}">Add Consultnt</a>
                    </li> 
                    <li>
                        <a href="{{route('SupportedIndex')}}">Supported</a>
                    </li>

                </ul>
            </li> --}}


             <li>
                <a class="{{ Request::is('admin/Social*') ? 'active-menu': '' }}" href="#"><i class="fa fa-share-square-o fa-3x"></i> Social Icon <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('SocialCreate')}}">Add Social Icon</a>
                    </li>
                    <li>
                        <a href="{{route('SocialIndex')}}">All Social Icon</a>
                    </li>

                </ul>
            </li>

              {{-- <li>
                <a class="{{ Request::is('admin/Gallery*') ? 'active-menu': '' }}" href="#"><i class="fa fa-picture-o fa-3x"></i> Gellary <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href="{{route('CategoryCreate')}}">Add Category</a>
                    </li> 
                    <li>
                        <a href="{{route('GalleryCreate')}}">Add Gallery</a>
                    </li>
                    <li>
                        <a href="{{route('GalleryIndex')}}">All Gallery</a>
                    </li>

                </ul>
            </li> --}}
<!-- 
            <li>
                <a class="" href=""><i class="fa fa-desktop fa-3x"></i>  </a>
            </li> -->
            
            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/objects*') ? 'active-menu': '' }}" href="{{ route('objects.index') }}"><i class="fa fa-desktop fa-3x"></i> Objects </a>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/mission*') ? 'active-menu': '' }}" href="{{ asset('admin/mission/index') }}"><i class="fa fa-eye fa-3x"></i> Mission and Vission </a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/activity*') ? 'active-menu': '' }}" href="#"><i class="fa fa-qrcode fa-3x"></i> Initative <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('activity.create') }}">Add Initative</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('activity.index') }}">All Initative</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/company*') ? 'active-menu': '' }}" href="#"><i class="fa fa-file-text-o fa-3x"></i> Company Management <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('company.create') }}">Add Company Management</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('company.index') }}">All Company Management</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}

          

            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/category*') ? 'active-menu': '' }}" href="#"><i class="fa fa-picture-o fa-3x"></i> Photo Category <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('category.create') }}">Add New Category</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('category.index') }}">All Category</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/item*') ? 'active-menu': '' }}" href="#"><i class="fa fa-file-image-o fa-3x"></i> Photo Item <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('item.create') }}">Add New Category</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('item.index') }}">All Category</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-video-camera fa-3x"></i> Gallery<span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}


                    {{--<li>--}}
                        {{--<a href="#">Photo Gallery<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-third-level">--}}

                            {{--<li>--}}
                                {{--<a href="{{ route('photo.create') }}">Add Photo</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('photo.index') }}">All Photo</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}

                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Video Gallery<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-third-level">--}}

                            {{--<li>--}}
                                {{--<a href="{{ route('video.create') }}">Add Video</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('video.index') }}">All Video</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}

                    {{--</li>--}}


                {{--</ul>--}}
            {{--</li>--}}

        
            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/adminuser*') ? 'active-menu': '' }}" href="#"><i class="fa fa-link fa-3x"></i> Member<span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('adminuser.index') }}">Pending List</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="">All Approved Member</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}



            <li>
                <a class="{{ Request::is('admin/SeoSetting*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cog fa-3x"></i> Seo Setting <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('HomepageSeo')}}">Home Page Seo</a>
                    </li>

                    {{--<li>--}}
                        {{--<a href="{{route('TechonologyPageSeo')}}">Our Consultant Page Seo</a>--}}
                    {{--</li>--}}


                    {{--<li>--}}
                        {{--<a href="{{route('BlogPageSeo')}}">News&Event Page Seo</a>--}}
                    {{--</li>--}}


                    {{--<li>--}}
                        {{--<a href="{{route('ContactPageSeo')}}">Contact Page Seo</a>--}}
                    {{--</li>--}}
                   

                </ul>
            </li>





        </ul>

    </div>

</nav>