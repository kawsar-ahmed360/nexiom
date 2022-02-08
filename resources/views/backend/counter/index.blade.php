@extends('backend.master')

@section('title','Counter Page')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Counter</h2>
                  
                      {{-- <a style="float:right"  class="btn btn-primary square-btn-adjust" data-toggle="modal" data-target="#exampleModal">Add Consultnt</a> --}}
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Counter
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Total Donation</th>
                                        <th style="text-align: center">Total Donation Count</th>

                                        <th style="text-align: center">Total project</th>
                                        <th style="text-align: center">Total project Count</th>

                                        <th style="text-align: center">Total Volunteers</th>
                                        <th style="text-align: center">Total Volunteers Count</th>

                                        <th style="text-align: center">Total Project Two</th>
                                        <th style="text-align: center">Total Project Two Count</th>
                                        {{-- <th style="text-align: center">Created At</th> --}}
                                        <th style="text-align: center">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($counter as $key=>$cou)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $cou->total_donation }}</td>
                                        <td style="text-align: center">{!!@$cou->total_donation_count!!}</td>
                                        <td style="text-align: center">{{ $cou->total_project }}</td>
                                        <td style="text-align: center">{!!@$cou->total_project_count!!}</td>
                                        <td style="text-align: center">{{ $cou->total_volunteers }}</td>
                                        <td style="text-align: center">{!!@$cou->total_volunteers_count!!}</td>
                                        <td style="text-align: center">{{ $cou->total_Projects_two }}</td>
                                        <td style="text-align: center">{!!@$cou->total_Projects_two_count!!}</td>
                                        {{-- <td>{!! $slider->sort_description !!}</td> --}}
                                        {{-- <td><img src="{{ asset('upload/consultnt/'.$cons->image) }}" class="img-thumbnail" width="100" height="100" /></td> --}}
                                        {{-- <td style="text-align: center" class="center">{{ date('d-M-y',strtotime($cou->created_at)) }}</td> --}}
                                        <td style="text-align: center">
                                            
                                       <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModaledite{{@$cou->id}}"><i class="fa fa-edit" ></i> Edit</a>
                                      
                                       {{-- <a href="{{route('ConsultntDelete',$cou->id)}}" id="delete" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a> --}}

                                              
                                {{-- {{route('SliderDelete',$slider->id)}}    --}}
                                           
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


<!-------Add Consultnt---------->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Add Consultnt</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('ConsultntStore')}}" method="post" enctype="multipart/form-data">
             @csrf

             <div class="row" style="margin-bottom:14px">
                 <div class="col-md-12">
                     <label for="">Name:</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter name">
                 </div>
             </div>

             <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Short Title:</label>
                    <input type="text" class="form-control" name="short_title" placeholder="Enter short title">
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="Enter short title">
                    <span style="color:red">Max Size: Width:380px,Height:300px</span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
         </form>
        </div>
       
      </div>
    </div>
  </div>

<!---------End Add Consultnt------------>




<!-------Edite Consultnt---------->
@foreach($counter as $key=>$cou)
<div class="modal fade" id="exampleModaledite{{@$cou->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Edite Counter</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('CounterUpdate')}}" method="post" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="edite_id" value="{{@$cou->id}}" id="edite_id">

             <div class="row" style="margin-bottom:14px">
                 <div class="col-md-6">
                     <label for="">Total Donation:</label>
                     <input type="text" class="form-control" name="total_donation" value="{{@$cou->total_donation}}" placeholder="Enter name">
                 </div>

                 <div class="col-md-6">
                    <label for="">Total Donation Count:</label>
                    <input type="text" class="form-control" name="total_donation_count" value="{{@$cou->total_donation_count}}" placeholder="Enter name">
                </div>
             </div>

             <div class="row" style="margin-bottom:8px">
                <div class="col-md-6">
                    <label for="">Total project:</label>
                    <input type="text" class="form-control" name="total_project" value="{{@$cou->total_project}}" placeholder="Enter Counter">
                </div>

                <div class="col-md-6">
                    <label for="">Total project Count:</label>
                    <input type="text" class="form-control" name="total_project_count" value="{{@$cou->total_project_count}}" placeholder="Enter Counter">
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-6">
                    <label for="">Total Volunteers:</label>
                    <input type="text" class="form-control" name="total_volunteers" value="{{@$cou->total_volunteers}}" placeholder="Enter Counter">
                </div>

                <div class="col-md-6">
                    <label for="">Total Volunteers Count:</label>
                    <input type="text" class="form-control" name="total_volunteers_count" value="{{@$cou->total_volunteers_count}}" placeholder="Enter Counter">
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-6">
                    <label for="">Total Project Two:</label>
                    <input type="text" class="form-control" name="total_Projects_two" value="{{@$cou->total_Projects_two}}" placeholder="Enter Counter">
                </div>

                <div class="col-md-6">
                    <label for="">Total Project Two Count:</label>
                    <input type="text" class="form-control" name="total_Projects_two_count" value="{{@$cou->total_Projects_two_count}}" placeholder="Enter Counter">
                </div>
            </div>


       

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
         </form>
        </div>
       
      </div>
    </div>
  </div>
  @endforeach

<!---------End Edite Consultnt------------>




@endsection





