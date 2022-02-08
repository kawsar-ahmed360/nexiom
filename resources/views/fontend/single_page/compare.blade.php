@extends('fontend.master')

@section('title')
   Compare
@endsection

@section('content')

    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>Products Compare </li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <!--  -->
    <div class="container ptb-40">
        <div class="com-header">
            <h2>Compare Models</h2>
        </div>

        <div class="comparison-table">
            <table class="table table-bordered">





                <tr>
                    <td class="align-middle">
                        <h2>Image</h2>
                    </td>
                    @foreach(@$comp as $key=>$com)
                        <td>
                            <div class="comparison-item">
                                <a class="comparison-item-thumb" href="#">
                                    <img style="width: 170px;display: block;margin: 0 auto;" src="{{(@$com->Product->product_image)?url('upload/product_image/'.@$com->Product->product_image):''}}"></a>
                                <a class="comparison-item-title" href="#">{{@$com->Product->product_name}}</a>
                            </div>
                        </td>
                    @endforeach



                </tr>




                <tr>
                    <th>Model</th>
                    @foreach(@$comp as $key=>$com)
                    <td>{{@$com->Product->model}}</td>
                    @endforeach

                </tr>
                @if(@$com->Product->bar!=null)
                <tr>
                    <th>Bar</th>
                    <td>{{@$com->Product->bar}}</td>

                </tr>
                @else
                    @endif
                {{--<tr>--}}
                    {{--<th>RESOLUTION</th>--}}
                    {{--<td>$600</td>--}}

                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Camera</th>--}}
                    {{--<td>$600</td>--}}

                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Battery</th>--}}

                    {{--<td>$600</td>--}}
                {{--</tr>--}}



            </table>
        </div>
    </div>

    <style type="text/css">
        /*body{margin-top:20px;}*/

        .com-header{
            padding: 0 0% 30px;
        }
        .com-header h2 {
            font-size: 1.8rem;
            font-weight: 500;
        }
        .align-middle h2{
            font-size: 18px;
        }
        .comparison-table {
            width: 100%;
            font-size: 1.6rem;;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar
        }

        .comparison-table table {
            min-width: 41rem;
            table-layout: fixed
        }

        .comparison-table table tbody+tbody {
            border-top-width: 1px
        }

        .comparison-table .table-bordered thead td {
            border-bottom-width: 1px;
            background: #fafafa;
        }

        .comparison-table .comparison-item {
            position: relative;
            padding: .875rem .75rem 1.125rem;
            border: 1px solid #e7e7e7;
            background-color: #fff;
            text-align: center
        }
        /*
        .comparison-table .comparison-item .comparison-item-thumb {
            display: block;
            width: 5rem;
            margin-right: auto;
            margin-bottom: .75rem;
            margin-left: auto
        }*/
        .comparison-table .comparison-item .comparison-item-thumb {
            display: block;
            width: 100%;
            margin-right: auto;
            margin-bottom: .75rem;
            margin-left: auto;
        }

        .comparison-table .comparison-item .comparison-item-thumb>img {
            display: block;
            width: 100%
        }
        .comparison-table .comparison-item .comparison-item-title {
            /* display: block; */
            /* width: 100%; */
            /* margin-bottom: 14px; */
            color: #222;
            padding-top: 0.7em;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
        }

        .comparison-table .comparison-item .comparison-item-title:hover {
            text-decoration: underline
        }

        .comparison-table .comparison-item .btn {
            margin: 0
        }

        .comparison-table .comparison-item .remove-item {
            display: block;
            position: absolute;
            top: -.3125rem;
            right: -.3125rem;
            width: 1.375rem;
            height: 1.375rem;
            border-radius: 50%;
            background-color: #f44336;
            color: #fff;
            text-align: center;
            cursor: pointer
        }

        .comparison-table .comparison-item .remove-item .feather {
            width: .875rem;
            height: .875rem
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #e7e7e7;
            padding: 17px 17px;
            text-align: center;
            color: #222;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .bg-secondary {
            background-color: #f7f7f7 !important;
        }
    </style>
    <!--  -->



@endsection