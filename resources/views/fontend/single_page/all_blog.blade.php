@extends('fontend.singlePageMaster')

@section('content')


    <!--Single Page Header Start-->
    <div class="page-header" data-bg-color="#212121" data-image-src="{{asset('fontend/images/upload/blog-bg-image.jpg')}}">
    	<div class="fit-screen-wrap">
            <div class="container">
                <div class="page-header-wrap animate-fadeIn">
                    <h2 class="featured-area-title">All <span data-color="#00e676">Blogs</span></h2>
                    <div data-height="30"></div>
                    <div class="featured-area-subtitle">
                  
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" data-bg-color="#212121" data-opacity="0.5"></div>
    </div>
    <!--Single Page Header End-->
    
    <!--Single Page Content Body Start-->
    <div class="page-sidebar" data-midnight="darkColor">
    	<div class="container nopadding">
        	<div class="page-sidebar-wrapper">
            	
                <!--Content Section Start-->
                <div class="content-wrapper">
                	<div class="inner-wrapper">


                        @foreach($blogs as $blog)
                    	
                        <!--Blog Entry 1 Start-->
                        <div class="blog-entry">
                        	
                            <!--Blog Thumbnail-->
                            <div class="blog-entry-thumbnail ripple">
                            	<a href="{{route('SingleNews',$blog->slug)}}">
                                	<figure>
                                    	<div class="thumbnail-hover"></div>
                                    	<img style="height:350px" src="{{($blog->image)?url('upload/news/'.$blog->image):''}}" alt="blog entry" />
                                    </figure>
                                </a>
                            </div>
                            
                            <!--Blog Title and Meta-->
                            <div class="blog-entry-title">
                            	<div class="post-date">
                                	<div class="date-wrap">
                                    	<span>{{date('d',strtotime($blog->created_at))}}</span>{{date('M',strtotime($blog->created_at))}}
                                    </div>
                                </div>
                                <div class="post-title">
                                	<h2>{{$blog->title}}</h2>
                                  
                                </div>
                            </div>
                            
                            <!--Blog Description-->
                            <div class="blog-entry-description">
                             {!!$blog->summery!!}
                            </div>
                            
                        </div>
                        <!--Blog Entry 1 End-->
                        @endforeach
                   
                        
                    </div>
                </div>
                <!--Content Section End-->
                
                <!--Pagination For Small Devices Start-->
              
                <!--Pagination For Small Devices End-->
                
                <div class="box-divider"></div>
                
                <!--Sidebar Section Start-->
                <div class="sidebar-wrapper">
                	<div class="inner-wrapper">
                    	
                        <!--Widget Recent Posts Start-->
                        <aside class="widget widget_recent_post">
                        	<h3 class="sidebar-title">Recent Posts</h3>
                          @foreach($recent_post as $rec)    
                            <!--Recent Post 1-->
                            <div class="recent-wrap">
                            	<div class="recent-post-thumb">
                                	<a href="{{route('SingleNews',$rec->slug)}}">
                                    	<figure class="fit-img ripple">
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="{{($rec->image)?url('upload/news/'.$rec->image):''}}" alt="recent post" />
                                        </figure>
                                    </a>
                                </div>
                                <div class="recent-post-detail">
                                	<h4><a href="{{route('SingleNews',$rec->slug)}}">{{$rec->title}}</a></h4>
                                    <div class="recent-description">
                                    	{!!$rec->summery!!}
                                    </div>
                                </div>
                            </div>
                            <!--End-->

                            @endforeach
                            
                     
                            
                        </aside>
                        <!--Widget Recent Posts End-->

                      
                        
                
                        
                    </div>
                </div>
                <!--Sidebar Section End-->
                
            </div>
        </div>
    </div>
    <!--Single Page Content Body End-->
    
    <!--Pagination Start-->
	<div class="">
		<div class="">
				
		</div>
	</div>
	<!--Pagination End-->

@endsection