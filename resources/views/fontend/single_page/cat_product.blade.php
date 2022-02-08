@extends('fontend.master')


@section('title') All Products @endsection

@section('content')


    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>{{@$category_name->category_name}} Product</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <!--Product List-->
    <div class="blog-page main-container space">
        <div class="container-fluid">
            <div class="blog-post-templare row animate" data-anim-type="fadeIn" data-anim-delay="300">
                <!--blog-post-->
             


                <div class="col-md-12">
                    <div class="blog-area gray-bg1 pt-100 pb-75">
                        <div class="row" >

                                            @forelse(@$products as $key=>$pro)
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-image">
                                    <img src="{{($pro->product_image)?url('upload/product_image/'.$pro->product_image):''}}" alt="">
                                </div>
                                <div class="blog-details text-center">
                                    <div class="blog-meta"><a class="titletip" href="{{route('CompareSection',base64_encode(@$pro->id))}}"><i class="fas fa-retweet" title=""></i><span class="textTop">Compare Product</span> </a></div>
                                    <h3><a href="{{route('ProductDetails',@$pro->slug)}}">{{@$pro->product_name}}</a></h3>
                                    <p><strong>Model : </strong> {{@$pro->model}}</p>
                                    <p><strong>Bar :</strong>  {{@$pro->bar}}</p>
                                    <a href="{{route('ProductDetails',@$pro->slug)}}" class="read-more">Find More</a>
                                    <!-- <a href="#home" class="titletip">Home<span class="textTop">Home</span></a> -->
                                </div>
                            </div>
                        </div>
                    
                        @empty
                        <img style="width: 600px;margin: 0 auto;display: block" src="{{asset('fontend/not.png')}}" alt="">
                    @endforelse

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