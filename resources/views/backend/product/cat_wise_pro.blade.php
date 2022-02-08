@extends('backend.master')

@section('title','Category Wise Product')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Category Wise Product</h2>
{{--                        <a style="float:right" href="{{ route('ProductCategoryCreate') }}" class="btn btn-primary square-btn-adjust">Add Product Category</a>--}}
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Product Category
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">SL.</th>
                                            <th style="text-align: center">Category Name</th>
                                            <th style="text-align: center">Total Product</th>

                                            <th style="text-align: center" width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                         <tr>
                                             @foreach(@$product as $key=>$pro)
                                             <td style="text-align: center">{{$key+1}}</td>
                                             <td style="text-align: center">{{@$pro->Category->category_name}}</td>
                                             <td style="text-align: center">{{@$pro->totalcount}}</td>
                                             <td style="text-align: center">
                                                 <a href="{{route('ProductIndex',@$pro->cat_id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                             </td>



                                         </tr>
                                         @endforeach



                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>

@endsection