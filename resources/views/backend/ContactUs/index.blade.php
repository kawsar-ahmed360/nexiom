@extends('backend.master')

@section('title','All Contact')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Contact</h2>
           <!--          <a style="float:right" href="{{ route('SliderCreate') }}" class="btn btn-primary square-btn-adjust">Add Contact</a> -->
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Contact
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        {{-- <th>Email Two</th> --}}
                                        <th>Office Address</th>
                                        <th>Created At</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                              
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>{{ $contact->mobile_one }}</td>
                                        <td>{{ $contact->email_one }}</td>
                                        {{-- <td>{{ $contact->email_two }}</td> --}}
                                        <td>{{ $contact->office_address }}</td>
                                     
                                        <td class="center">{{ $contact->created_at }}</td>
                                        <td><a href="{{route('ContactEdite',$contact->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                
                                            
                                           
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

