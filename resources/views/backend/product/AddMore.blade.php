@extends('backend.master')

@section('title','Product Details Add More')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Porduct Details Add More</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Porduct Details Add More
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('ProductDetailsAddMorePost')}}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$pro_id}}" name="ProdId" placeholder="Enter ProId">


                                   @forelse(@$all_des as $key=>$showall)
                                      <div class="document">

                                          <input type="hidden" value="exists" name="alreadyExhis">
                                          <div class="remove_html">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <label for="">Title</label>
                                                  <input type="text" class="form-control" name="title[]" value="{{@$showall->title}}" placeholder="Enter title">
                                              </div>

                                              <div class="col-md-12">
                                                  <label for="">Summary</label>
                                                  <textarea name="summary[]" id="summary[]" class="form-control ckeditor" id="" cols="3" rows="1">{!! @$showall->summary !!}</textarea>
                                              </div>
                                              <div class="col-md-12" style="text-align: center;padding:9px;">
                                                  <a class="btn btn-success addmore"><i class="fa fa-plus-circle"></i> Add More</a>
                                                  <a class="btn btn-danger removemore"><i class="fa fa-minus-circle"></i> Remove More</a>
                                              </div>
                                          </div>
                                          </div>
                                      </div>
                                        @empty


                                            <div class="document">
                                                {{--<div class="remove_html">--}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Title</label>
                                                        <input type="text" class="form-control" name="title[]" placeholder="Enter title">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="">Summary</label>
                                                        <textarea name="summary[]" id="summary[]" class="form-control ckeditor" id="" cols="3" rows="1"></textarea>
                                                    </div>
                                                    <div class="col-md-12" style="text-align: center;padding:9px;">
                                                        <a class="btn btn-success addmore"><i class="fa fa-plus-circle"></i> Add More</a>
                                                        <a class="btn btn-danger removemore"><i class="fa fa-minus-circle"></i> Remove More</a>
                                                    </div>
                                                </div>
                                                {{--</div>--}}
                                            </div>

                                       @endforelse


                                        {{-- <a href="{{ route('CategoryIndex') }}" class="btn btn-danger">Back</a> --}}
                                        <a href="{{ route('ProductCatWiseIndex') }}" class="btn btn-info">All Product</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                    </form>
                                    <br />




                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->



        <div class="document_new" style="display: none;">
            <div class="whole_html">
            <div class="remove_html">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title[]" placeholder="Enter title">
                </div>

                <div class="col-md-12">
                    <label for="">Summary</label>
                    <textarea name="summary[]" id="summary[]" class="form-control" id="" cols="3" rows="7" placeholder="Enter Summary"></textarea>
                </div>
                <div class="col-md-12" style="text-align: center;padding:9px;">
                    <a class="btn btn-success addmore"><i class="fa fa-plus-circle"></i> Add More</a>
                    <a class="btn btn-danger removemore"><i class="fa fa-minus-circle"></i> Remove More</a>
                </div>
            </div>
            </div>
            </div>

        </div>


    @section('footer')
            <script>
                var count = 0;
                $(document).on('click','.addmore',function () {

                    var whole_html = $('.whole_html').html();
                    $('.document').append(whole_html);
                    count++;

                })
            </script>

            <script>
                var count = 0;
                $(document).on('click','.removemore',function () {

                    $(this).closest('.remove_html').remove();
                    count--;


                })
            </script>
        @endsection


@endsection