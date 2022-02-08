@extends('fontend.master')


@section('title') All Products @endsection

@section('content')


    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <!--Product List-->
    <div class="blog-page main-container space">
        <div class="container-fluid">
            <div class="blog-post-templare row animate" data-anim-type="fadeIn" data-anim-delay="300">
                <!--blog-post-->
                <!--sidebar-->
                <div class="col-md-3 sidebar">
                    <!--widgets-cat-->
                    <div class="blog-sidebar-widgets animate fadeInRight" data-anim-type="fadeInRight"
                         data-anim-delay="400">
                        <h4 class="widgets-title"><span>  Find a Products </span></h4>
                        <div class="blog-sidebar">
                            {{--<form role="search" method="get" id="searchform" class="searchform" action="#">--}}
                                <div class="row m-0">
                                    <input type="text" name="search" id="search"  placeholder="Search">
                                    <button type="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
                                </div>
                            {{--</form>--}}
                        </div>
                        <ul class="widgets-cat">
                            @foreach(@$category as $key=>$cat)
                            <li class="cat-item" >
                                <a>
                                    <input id="cat{{$cat->id}}" class="input-radio" style="width: 20px;height:18px;" type="checkbox" value="{{@$cat->id}}"  name="cat[]">
                                    <span>{{@$cat->category_name}}</span></a>
                                {{--<a id="co{{$cat->id}}" onclick="CategoryFilter({{@$cat->id}})">  <span>{{@$cat->category_name}}</span></a>--}}
                            </li>

                                @endforeach

                        </ul>
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="blog-area gray-bg1 pt-100 pb-75">
                        <div class="row" id="showall">

                          @include('fontend.single_page.filter.str_filter')

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product List-->



    @section('footer')
        <script>

             $('#search').on('keyup',function () {
                  var str = $(this).val();

                $.ajax({
                    url:"{{route('stringProductFilter')}}",
                    type:"GET",
                    data:{str:str},
                    success:function (data) {
                      $('#showall').html(data);
                    }
                })

             })

        </script>

        <script>
            var cat = [];
            $('input[name="cat[]"]').on('change', function (e) {
                e.preventDefault();
                cat = [];
                $('input[name="cat[]"]:checked').each(function()
                {
                    cat.push($(this).val());
                });


                $.ajax({

                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    type:'GET',

                    url: '{{route("CategoryProductFilter")}}',

                    data:{cat:cat},

                    success:function(data){


                        $('#showall').empty().html(data)

                    }

                });
            });
        </script>



        {{--<script>--}}
            {{--var cat=[];--}}
            {{--function CategoryFilter($id){--}}
                {{--cat.push($id);--}}


                {{--for(var i=1; i<=200; i++){--}}

                    {{--if($id==i){--}}

                        {{--$('#co'+i).css({--}}
                            {{--"color":"red"--}}
                        {{--})--}}

                    {{--}else{--}}
                        {{--$('#co'+i).css({--}}
                            {{--"color":""--}}
                        {{--})--}}
                    {{--}--}}
                {{--}--}}



                {{--$.ajax({--}}
                    {{--url:"{{route('CategoryProductFilter')}}",--}}
                    {{--type:"GET",--}}
                    {{--data:{cat:cat,str:str},--}}
                    {{--success:function (data) {--}}
                        {{--$('#showall').html(data);--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--</script>--}}
        @endsection


@endsection