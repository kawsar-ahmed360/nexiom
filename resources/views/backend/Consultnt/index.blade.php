@extends('backend.master')

@section('title','All Consultnt')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Consultant</h2>
                  
                      <a style="float:right"  class="btn btn-primary square-btn-adjust" data-toggle="modal" data-target="#exampleModal">Add Consultant</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Consultant
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">Shor Title</th>
                                        {{-- <th>Short Description</th> --}}
                                        <th style="text-align: center">Image</th>
                                        <th style="text-align: center">Created At</th>
                                        <th width="17%;" style="text-align: center">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($consul as $key=>$cons)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cons->name }}</td>
                                        <td>{!!@$cons->short_title!!}</td>
                                        {{-- <td>{!! $slider->sort_description !!}</td> --}}
                                        <td><img src="{{ asset('upload/consultnt/'.$cons->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                        <td class="center">{{ date('d-M-y',strtotime($cons->created_at)) }}</td>
                                        <td>
                                            
                                       <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModaledite{{@$cons->id}}"><i class="fa fa-edit" ></i> Edit</a>
                                      
                                       <a href="{{route('ConsultntDelete',$cons->id)}}" id="delete" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a>

                                              
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
          <h4 class="modal-title" id="exampleModalLabel" >Add Consultant</h4>
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
@foreach($consul as $key=>$cons)
<div class="modal fade" id="exampleModaledite{{@$cons->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Edite Consultant</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('ConsultntUpdate')}}" method="post" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="edite_id" value="{{@$cons->id}}" id="edite_id">

             <div class="row" style="margin-bottom:14px">
                 <div class="col-md-12">
                     <label for="">Name:</label>
                     <input type="text" class="form-control" name="name" value="{{@$cons->name}}" placeholder="Enter name">
                 </div>
             </div>

             <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Short Title:</label>
                    <input type="text" class="form-control" name="short_title" value="{{@$cons->short_title}}" placeholder="Enter short title">
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="Enter short title">
                    <span style="color:red">Max Size: Width:380px,Height:300px</span>
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Old Image:</label>
                    <img style="width: 50px" src="{{(@$cons->image)?url('upload/consultnt/'.$cons->image):''}}" alt="">
                    
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





