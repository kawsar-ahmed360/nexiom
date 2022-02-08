@extends('backend.master')

@section('title','All Category')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Product Category</h2>
                        <a style="float:right" href="{{ route('ProductCategoryCreate') }}" class="btn btn-primary square-btn-adjust">Add Product Category</a>
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
                                            <th>SL.</th>
                                            <th>Category Name</th>
                                             <th>Category Image</th>
                                            
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categoryView as $key=>$category)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                 <td><img style="width: 100px" src="{{(@$category->category_image)?url('upload/category_image/'.$category->category_image):''}}"></td>
                                                

                                                <td>
                                                    <a href="{{route('ProductCategoryEdite',$category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{route('ProductCategoryDelete',$category->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Delete</a>
                                                    
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