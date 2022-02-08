@extends('backend.master')

@section('title','News&Event Seo Page ')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Seo News&Event Page</h2>
         
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Seo Blog Page
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Meta Title</th>
                                        <th>Meta Description</th>
                                   
                                        
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($blog_page_seo as $key => $blog)
                                            
                                      
                              
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        {{-- <td><img style="width: 100px" src="{{(@$about->title)?url('upload/about/'.$about->title):''}}" alt=""></td> --}}
                                        {{-- <td>{!! $about->title !!}</td> --}}
                                         <td style="font-family:serif;font-size:26px">{!! $blog->meta_title !!}</td>
                                         <td style="font-family:serif;font-size:26px">{!! $blog->meta_des !!}</td>
                                    
                                     
                                        
                                        <td style="vertical-align: middle;text-align:center;">
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{@$blog->id}}">
                                                Edite
                                              </button>

                                           
                                           
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



<!-----------Modal Section-------->
@foreach($blog_page_seo as $key => $blog)
<div class="modal fade" id="exampleModal{{@$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Blog Page Seo Edite</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <form action="{{route('BlogPageSeoPost')}}" method="post">
                @csrf

                <input type="hidden" name="edite_id" value="{{@$blog->id}}">

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input class="form-control" type="text" name="meta_title" value="{{@$blog->meta_title}}" id="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_des" id="meta_des" cols="30" rows="10">{!!@$blog->meta_des!!}</textarea>
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>

  @endforeach

@endsection

