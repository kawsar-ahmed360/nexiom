<footer class="Partner-section">
    <div class="container">
        <!--footer-widgets-->
        <div class="footer-widgets container animate fadeInDownLarge" data-anim-type="fadeInDownLarge" data-anim-delay="400">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="widgets-col">
                        <a class="navbar-brand pb-2" href="{{route('MainIndex')}}"> <img src="{{(@$logo->logo)?url('upload/logo/'.$logo->logo):''}}" alt="logo_img" class="img-fluid"> </a>


                        <p>
                            <i class="fas fa-map"></i> <span>{{@$contact->office_address}}</span>
                        </p>
                        <p>
                            <i class="fas fa-phone-square"></i> <span>Land: {{@$contact->mobile_one}}, Mobile: {{@$contact->mobile_two}}</span>
                        </p>
                        <p>
                            <i class="far fa-envelope"></i> <span> {{@$contact->email_two}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="widgets-col">
                        <h3> Important link </h3>
                        <ul class="widget_links">
                            <li>
                                <a href="{{route('MainIndex')}}"> Home </a>
                            </li>
                            @foreach(@$quick_link as $main_menu)
                                <?php
                                $submenus = App\Menu::where('root_id',$main_menu->id)
                                    ->where('sroot_id',NULL);
                                if($submenus->count() > 0){
                                    $class='<span class="arrow"></span>';
                                }
                                else{
                                    $class='';

                                }

                                ?>
                                <li>
                                    <a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a>
                                </li>

                                @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="widgets-col">
                        <h3> Google map </h3>

                        <div class="map">
                            <iframe src="{{@$contact->web_one}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//footer-widgets-->
<div class="row coppy-right">
    <div class="container">
        <div class="col-md-4">
            <p style="color: #fff;"> Copyright @ Nexim BD 2021  All Rights Reserved. </p>
        </div>
        <div class="col-md-4">
            <ul class="social-icons">
                @foreach($socialIcon as $soc)
                <li><a href="{{@$soc->url}}"><i class="{{$soc->link}} icon"></i></a></li>
               @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="footer-menu">
                <p><a target="_blank" href="https://esoft.com.bd/">Web Design Company </a> e-Soft</p>
            </ul>
        </div>
        <!--./coppy-right-->
    </div>
</div>








