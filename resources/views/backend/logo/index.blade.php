@extends('backend.master')

@section('title','Logo Page')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Logo Page</h2>
                      
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Logo Page
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">SL.</th>
                                            <th style="text-align: center">Logo</th>
                                            <!--<th style="text-align: center">Description</th>-->
                                            
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr class="odd gradeX">
                                                <td style="text-align: center">1</td>
                                                <td style="text-align: center"> <img src="{{(@$logo->logo)?url('upload/logo/'.$logo->logo):''}}" style="height: 100px; width: 100px"></td>
                                                <!--<td style="text-align: jsutify">{!!@$logo->description!!}</td>-->
                                                <!-- <td></td> -->

                                                <td style="text-align: center">
                                                    <a href="{{route('LogoEdite',$logo->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                  
                                                    
                                                </td>
                                            </tr>
                                    



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