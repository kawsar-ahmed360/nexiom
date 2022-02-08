@extends('backend.master')

@section('title','All Social Icon')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Social Icon</h2>
                    <a style="float:right" href="{{ route('SocialCreate') }}" class="btn btn-primary square-btn-adjust">Add Social Icon</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Social
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
                                    @foreach($social as $key=>$socials)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $socials->icon }}</td>
                                        <td>{{ $socials->url }}</td>
                                      
                                        <td class="center">{{ $socials->created_at }}</td>
                                        <td><a href="{{route('SocialEdite',$socials->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="{{route('SocialDelete',$socials->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                            
                                           
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

