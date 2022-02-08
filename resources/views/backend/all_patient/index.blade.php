@extends('backend.master')

@section('title','All Patient')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Patient</h2>
                    <a style="float:right" href="{{ route('AllPatientCreate') }}" class="btn btn-primary square-btn-adjust">Add Patient</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Patient
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">Short Title</th>
                                     
                                        <th style="text-align: center">Image</th>
                                        <th style="text-align: center">Created At</th>
                                        <th width="17%;" style="text-align: center">Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                       @foreach ($patient as $key=>$pat)
                                           <tr>
                                               <td style="text-align: center">{{@$key+1}}</td>
                                               <td style="text-align: center">{{@$pat->title}}</td>
                                               <td style="text-align: justify">{{@$pat->short_title}}</td>
                                               <td style="text-align: center">
                                                    <img style="width:100px" src="{{(@$pat->image)?url('upload/all_patient/'.$pat->image):''}}" alt="">
                                               </td>
                                               <td style="text-align: center">{{@$pat->created_at}}</td>
                                               <td style="text-align: center">
                                                     <a href="{{route('AllPatientEdite',$pat->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edite</a>
                                                     <a href="{{route('AllPatientDelete',$pat->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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

