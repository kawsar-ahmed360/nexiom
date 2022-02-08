@extends('backend.master')

@section('title','Our Client')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Clients</h2>
                        <a style="float:right"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary square-btn-adjust">Add Client</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Clients
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Icon</th>
                                            <th>Url</th>

                                            <th>Created At</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($index as $key=>$socials)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $socials->url }}</td>
                                                <td><img style="width: 100px;" src="{{(@$socials->image)?url('upload/Client/'.@$socials->image):''}}" alt=""></td>

                                                <td class="center">{{ $socials->created_at }}</td>
                                                <td><a data-toggle="modal" data-target="#exampleModalEdite{{@$key}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                                    <a href="{{route('ClientDelete',$socials->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>


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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('ClientStore')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Url</label>
                                <input type="text" class="form-control" name="url" placeholder="Enter link">
                            </div>


                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Enter link">
                                <span style="color:red">Max Size: Width:250px,Height:120px</span>
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
    </div>    <!-- Modal -->

    @foreach($index as $key=>$socials)
    <div class="modal fade" id="exampleModalEdite{{@$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('ClientUpdate')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{@$socials->id}}" name="EditeId">

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Url</label>
                                <input type="text" class="form-control" name="url" value="{{@$socials->url}}" placeholder="Enter link">
                            </div>


                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Enter link">
                                <span style="color:red">Max Size: Width:250px,Height:120px</span>
                            </div>


                            <div class="col-md-12">
                                <label for="">Old Image</label> <br>
                                <img style="width: 100px;" src="{{(@$socials->image)?url('upload/Client/'.@$socials->image):''}}" alt="">

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

