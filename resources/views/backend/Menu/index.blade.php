@extends('backend.master')

@section('title','All Menu')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Menu</h2>
                        <a style="float:right" href="{{route('MenuCreate')}}" class="btn btn-primary square-btn-adjust">Add Menu</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Menu
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;">SL.</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Publish</th>
                                            <th style="text-align: center;">Display Sequence</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($menu as $key=>$menu)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $menu->menu_name }}</td>
                                                <td>Publish</td>
                                                <td class="center">Sequence</td>
                                                <td style="text-align: center;">


                                                <a href="{{route('MenuEdite',$menu->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="{{route('MenuDelete',$menu->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                    
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