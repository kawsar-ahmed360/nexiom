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
                @if(@$pro->model!=null)
                <p><strong>Bar :</strong>  {{@$pro->bar}}</p>
                @else
                    @endif
                <a href="{{route('ProductDetails',@$pro->slug)}}" class="read-more">Find More</a>
                <!-- <a href="#home" class="titletip">Home<span class="textTop">Home</span></a> -->
            </div>
        </div>
    </div>

    @empty
    <img style="width: 600px;margin: 0 auto;display: block" src="{{asset('fontend/not.png')}}" alt="">
@endforelse