@extends('backend.master')

@section('title','All Service')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Service</h2>
                    <a style="float:right" href="{{ route('ServiceCreate') }}" class="btn btn-primary square-btn-adjust">Add Service</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Service
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Image</th>

                                            <th>Created At</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($service as $key=>$service)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>{{ $service->sub_title }}</td>
                                                <td><img src="{{ (@$service->image)?url('upload/service/'.$service->image):'' }}" alt="" width="100px"></td>
                                                <td class="center">{{ $service->created_at }}</td>
                                                <td><a href="{{route('ServiceEdite',$service->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{@$service->id}}" action="{{route('ServiceDelete',$service->id)}}" style="display: none;" method="get">
                                                        @csrf

                                                    </form>
                                                    <button  type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $service->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }" class="btn btn-danger btn-sm buttonclick"><i class="fa fa-trash"></i> Delete</button>
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

    @section('footer')
        <script>
            $(document).on('click','.buttonclick',function () {
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

                Toast.fire({
                    icon: 'success',
                    title: 'successfully Deleted'
                })
            })
        </script>
        @endsection

@endsection

