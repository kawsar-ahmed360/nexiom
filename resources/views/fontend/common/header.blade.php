<div class="topnav">
    <header class="bg-color-custom ">
        <div class="container top-bar">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <ul class="top-content">
                    <!-- <li><i class="fas fa-envelope icon"></i>RoadLinersTransport@example.com</li> -->
                        <li> <i class="fas fa-phone-volume icon"></i>{{@$contact->mobile_two}}</li>
                    </ul>
                </div>
                <div class="col-md-3 col-md-3 col-xs-12">
                    <ul class="top-content mail-center">
                    <!-- <li><i class="fas fa-envelope icon"></i>RoadLinersTransport@example.com</li> -->
                        <li><i class="fas fa-envelope icon"></i>{{@$contact->email_one}}</li>
                    </ul>

                </div>
                <div class="col-md-4 col-md-4 col-xs-12">
                    <ul class="top-content float-right">
                        @foreach(@$socialIcon as $key=>$so)
                        <li><a href="{{@$so->link}}"><i class="{{@$so->icon}}"></i></a></li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>



<!-- mobile-sidemenu -->
<div class="row nav-menu">
    <div class="container mob-sidebar">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="crbnMenu">
                <div class="mb-search">
                    <div class="form-group has-search">
                        <span class="fas fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>

                <ul class="menu">
                    <li><a class="nav-link" href="{{route('MainIndex')}}"><span>Home</span> </a></li>

                    @foreach($main as $main_menu)
                        <?php
                        $submenus = App\Menu::where('root_id',$main_menu->id)
                            ->where('sroot_id',NULL);
                        if($submenus->count() > 0){
                            $class='nav-link dropdown-toggle';
                        }
                        else{
                            $class='';

                        }

                        ?>
                    <li>
                        <a class="nav-link" href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"><span>{{$main_menu->menu_name}}</span> <span class="menu-toggle"><i
                                        class="fas fa-angle-down" aria-hidden="true"></i></span>
                        </a>

                        @if($submenus->count() > 0)
                        <ul class="drop-link">
                            @foreach($submenus->get() as $smenus)
                                <?php $thirdmenus = App\Menu::where('sroot_id',$smenus->id)
                                    ->where('troot_id',NULL);?>
                            <li>
                                <a href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif"> {{ $smenus->menu_name }}</a>
                            </li>
                           @endforeach
                        </ul>
                            @endif
                    </li>

                        @endforeach


                </ul>
            </div>
        </div>
        <span class="side-btn" style="cursor:pointer" onclick="openNav()">&#9776;</span>
        <a class="navbar-brand pb-2" href="{{route('MainIndex')}}"> <img src="{{(@$logo->logo)?url('upload/logo/'.@$logo->logo):''}}" alt="logo_img"> </a>
    </div>
</div>
<!-- mobile-sidemenu -->



<!-- desktop-menu -->
<div class="row first-menu  update-menu">
    <div class="container">
        <nav class="navbar navbar-expand-sm offcanvas-desktop">
            <div class="col-md-2 ">
                <a class="navbar-brand pb-2" href="{{route('MainIndex')}}"> <img src="{{(@$logo->logo)?url('upload/logo/'.@$logo->logo):''}}" alt="logo_img"> </a>
            </div>
            <div class="col-md-8 collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{route('MainIndex')}}">Home</a></li>

                    @foreach($main as $main_menu)
                        <?php
                        $submenus = App\Menu::where('root_id',$main_menu->id)
                            ->where('sroot_id',NULL);
                        if($submenus->count() > 0){
                            $class='fas fa-angle-down';
                        }
                        else{
                            $class='';

                        }

                        ?>
                    <li class="nav-item dropdown dropdown-slide dropdown-hover">


                        {{--<a class="nav-link <?php echo $class?>" href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif" id="navbarDropdown2" data-toggle="dropdown"--}}
                                                                                    {{--aria-haspopup="true" aria-expanded="false"> {{$main_menu->menu_name}} --}}
                        {{--</a>--}}
                        <a class="nav-link" href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"> {{$main_menu->menu_name}} <i class="<?php echo $class;?>"></i></a>
                        @if($submenus->count() > 0)
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            @foreach($submenus->get() as $smenus)
                                <?php $thirdmenus = App\Menu::where('sroot_id',$smenus->id)
                                    ->where('troot_id',NULL);?>


                            <a class="dropdown-item" href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif">{{ $smenus->menu_name }}</a>



                                @endforeach
                            </div>

                        @endif
                    </li>


                @endforeach
                </ul>

            </div>
            <div class="col-md-2">
                <div class="search-container">
                    <form action="{{route('SeachingSystem')}}" method="post">
                        @csrf
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                        <input type="text" autocomplete="off" onfocus="ShowSearchResult()" onblur="HideSearchResult()" id="searchs" name="search">
                    </form>

                    <div id="filterProductShow" style="background:white;z-index:9999;width:100%;top:100%;left:0;margin-top:2px;position: absolute;"></div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- desktop-menu -->









