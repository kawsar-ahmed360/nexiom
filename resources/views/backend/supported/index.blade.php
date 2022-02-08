@extends('backend.master')

@section('title','Supported Page')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Supported</h2>
                  
                      <a style="float:right"  class="btn btn-primary square-btn-adjust" data-toggle="modal" data-target="#exampleModal">Add Supported</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Supported
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Supported Image</th>
                                     
                                        <th style="text-align: center">Created At</th>
                                        <th style="text-align: center">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($supported as $key=>$suppor)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>

                                        <td style="text-align: center"><img src="{{ asset('upload/supported/'.$suppor->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                        <td style="text-align: center" class="center">{{ date('d-M-y',strtotime($suppor->created_at)) }}</td>
                                        <td style="text-align: center">
                                            
                                       <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModaledite{{@$suppor->id}}"><i class="fa fa-edit" ></i> Edit</a>
                                      
                                       <a href="{{route('SupportedDelete',$suppor->id)}}" id="delete" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a>

                                              
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
          <h4 class="modal-title" id="exampleModalLabel" >Add Supported Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('SupportedStore')}}" method="post" enctype="multipart/form-data">
             @csrf

       


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="Enter short title">
                    <span style="color:red">Max Size: Width:200px,Height:60px</span>
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
@foreach($supported as $key=>$suppor)
<div class="modal fade" id="exampleModaledite{{@$suppor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Edite Supported Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('SupportedUpdate')}}" method="post" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="edite_id" value="{{@$suppor->id}}" id="edite_id">



            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Supported Image:</label>
                    <input class="form-control" type='file' name="image" id="image" id="">
                    <span style="color:red">Max Size: Width:200px,Height:60px</span>
                </div>
            </div>

            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Old Image:</label>
                    <img src="{{ asset('upload/supported/'.$suppor->image) }}" class="img-thumbnail" width="100" height="100" />
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





