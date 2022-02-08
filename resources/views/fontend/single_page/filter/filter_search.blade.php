<style>
    .search_item_desing{
        padding-top:10px;
    }
    .design_li{
        list-style-type: none;
        padding: 5px 19px 6px;
        border-bottom: 1px dotted lightgray;

    }
    .design_li:hover{
        background: white;
        cursor: pointer;

    }

    .design_li a:hover{
        color: #3333333;
    }

    .sub-menu {
        padding: 0;
        max-height: 20em; /* 1.5 x 3 */
        overflow-y: auto;
    }
</style>


<ul class="search_item_desing sub-menu" style="overflow-y:scroll;">
    @forelse($product as $key => $pro)


        <a href="{{route('ProductDetails',@$pro->slug)}}">
            {{-- <datalist id="datalist"> --}}
            <li class="design_li">

                {{--<img style="width: 40px;height:40px;border: 2px solid burlywood;" src="{{(@$pro->product_image)?url('upload/product_image/'.$pro->product_image):''}}" alt="">--}}
                <strong style="padding-left: 3px;font-family: monospace;">{{@$pro->product_name}}</strong>

            </li>
            {{-- <datalist> --}}
        </a>



    @empty

        <li class="design_li" style="color:red;padding:0px 20px">Product Not Found!!!!!!!!!!</li>

    @endforelse
</ul>