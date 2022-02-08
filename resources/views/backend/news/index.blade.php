@extends('backend.master')

@section('title','News Or Event Page')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All News</h2>
                  
                      <a style="float:right"  class="btn btn-primary square-btn-adjust" data-toggle="modal" data-target="#exampleModal">Add New</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All News
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Title</th>
                                        <th style="text-align: center">Short_title</th>
                                        <th style="text-align: center">Image</th>
                                        <th style="text-align: center">Created At</th>
                                        <th style="text-align: center">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $key=>$new)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $new->title }}</td>
                                        <td style="text-align: center">{{ str_limit($new->summery,70) }}</td>
                                        <td style="text-align: center"><img src="{{ asset('upload/news/'.$new->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                        <td style="text-align: center" class="center">{{ date('d-M-y',strtotime($new->created_at)) }}</td>
                                        <td style="text-align: center;width:150px">
                                            
                                       <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModaledite{{@$new->id}}"><i class="fa fa-edit" ></i> Edit</a>
                                      
                                       <a href="{{route('NewsDelete',$new->id)}}" id="delete" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a>

                                              
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


<!-------Add News---------->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:800px">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Add News</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('NewsStore')}}" method="post" enctype="multipart/form-data">
             @csrf




             <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter News title">
                    
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Short Title:</label>
                    <input type="text" class="form-control" name="summery" placeholder="Enter News Short title">
                    
                </div>
            </div>

            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Description:</label>
                    <textarea type="text" class="form-control ckeditor" name="description" placeholder="Enter News description"> </textarea>
                    
                </div>
            </div>


       


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="Enter short title">
                    <span style="color:red">Max Size: Width:570px,Height:400px</span>
                </div>
            </div>


             <div class="row" style="margin-bottom:8px">
                 <div class="col-md-12">
                     <label for="">Meta Title:</label>
                     <input type="text" class="form-control" name="meta_title" placeholder="Enter meta_title">

                 </div>
             </div>


             <div class="row" style="margin-bottom:8px">
                 <div class="col-md-12">
                     <label for="">Meta Description:</label>
                     <textarea name="meta_des" id="meta_des"  class="form-control" cols="30" rows="5"></textarea>

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

<!---------End Add News------------>




<!-------Edite News---------->
@foreach($news as $key=>$new)
<div class="modal fade" id="exampleModaledite{{@$new->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:800px">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" >Edit News</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('NewsUpdate')}}" method="post" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="edite_id" value="{{@$new->id}}" id="edite_id">






             <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Title:</label>
                    <input type="text" class="form-control" name="title" value="{{@$new->title}}" placeholder="Enter News title">
                    
                </div>
            </div>


            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Short Title:</label>
                    <input type="text" class="form-control" name="summery" value="{{@$new->summery}}" placeholder="Enter News Short title">
                    
                </div>
            </div>

            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">News Description:</label>
                    <textarea type="text" class="form-control ckeditor" name="description" placeholder="Enter News description">{!!@$new->description!!} </textarea>
                    
                </div>
            </div>





            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for=""> Image:</label>
                    <input class="form-control" type='file' name="image" id="image" id="">
                    <span style="color:red">Max Size: Width:570px,Height:400px</span>
                </div>
            </div>

            <div class="row" style="margin-bottom:8px">
                <div class="col-md-12">
                    <label for="">Old Image:</label>
                    <img src="{{ asset('upload/news/'.$new->image) }}" class="img-thumbnail" width="100" height="100" />
                </div>
            </div>


             <div class="row" style="margin-bottom:8px">
                 <div class="col-md-12">
                     <label for="">Meta Title:</label>
                     <input type="text" class="form-control" name="meta_title" value="{{@$new->meta_title}}" placeholder="Enter meta_title">

                 </div>
             </div>


             <div class="row" style="margin-bottom:8px">
                 <div class="col-md-12">
                     <label for="">Meta Description:</label>
                     <textarea name="meta_des" id="meta_des"  class="form-control" cols="30" rows="5">{{@$new->meta_des}}</textarea>

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

<!---------End Edite News------------>




@endsection





