@extends('backend.master')

@section('title','Add Menu')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Menu</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Menu
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('MenuUpdate',$menu->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="menu_name" value="{{ $menu->menu_name }}" placeholder="Title" />

                                        </div>



                                        <div class="form-group">
                                            <label for="inputName">Parent Menu</label>
                                            <select name="root_id" class="form-control @error('root_id') is-invalid @enderror"  onchange="ajaxSearch(this.value,'subcatid','root_id')">

                                                @if (!(empty($parent_id_for->menu_name)))
                                                    <option value="{{$menu->root_id}}">{{$parent_id_for->menu_name}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($main as $main_menu)

                                                    <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>

                                                @endforeach
                                            </select>
                                            @error('root_id')
                                            <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label for="inputName">Sub Menu</label>
                                            <div id="subcatid">
                                                <select name="sroot_id" class="form-control @error('sroot_id') is-invalid @enderror" onChange="">



                                                    @if (!(empty(@$sub_id_for->menu_name)))
                                                        <option value="">{{@$sub_id_for->menu_name}}</option>

                                                    @else
                                                        <option value="">Select Sub Menu</option>

                                                    @endif


                                                    @foreach($sub_main as $sub_main)

                                                        <option value="{{$sub_main->id}}">{{$sub_main->menu_name}}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('sroot_id')
                                            <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Last Menu</label>
                                            <div id="lastcatid">
                                                <select name="troot_id" class="form-control @error('troot_id') is-invalid @enderror">
                                                    <option value="">Last Menu</option>
                                                    @if (!(empty(@$last_id_for->menu_name)))
                                                        <option value="">{{@$last_id_for->menu_name}}</option>

                                                    @else
                                                        <option value="NULL">Select Last Menu</option>

                                                    @endif


                                                    @foreach($menu_all as $main_menu)

                                                        <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('troot_id')
                                            <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Page Type</label>  <select name="page_type" class="form-control @error('page_type') is-invalid @enderror" onChange="">
                                                @if (!(empty($menu->page_type)))
                                                    <option value="{{$menu->page_type}}">{{$menu->page_type}}</option>
                                                @else

                                                    <option value="">Select Page Type</option>

                                                @endif
                                                <option value="page">Page</option>
                                                <option value="Service">Service</option>
                                                <option value="gallery">Picture Gallery</option>
                                                <option value="video">Video Gallery</option>
                                                <option value="contact">Contact Us</option>
                                                <option value="url">Url</option>

                                            </select>
                                            @error('page_type')
                                            <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>External Link</label>
                                            <input class="form-control" name="external" placeholder="External Link" value="{{$menu->external_link}}" />

                                        </div>
                                        <div class="form-group">
                                            <label>Target Window</label>
                                            <select name="target" class="form-control" onChange="">
                                                <option value="">Target Window</option>

                                                <option value="_self">Same Window</option>
                                                <option value="_blank">New Window</option>

                                            </select>

                                        </div>
                                        {{-- <div class="form-group">
                                            <label>Main</label>
                                            <div>
                                                <input type="checkbox" class="form-control" name="display"  value="1" @if($menu->display==1) checked="checked" @endif>
                                            </div>

                                            <label>Footer</label>
                                            <div>
                                                <input type="checkbox" class="form-control" name="footer1"  value="1" @if($menu->footer1==1) checked="checked" @endif>
                                            </div>

                                        </div> --}}


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Top Menu</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" class="form-control" name="display"  value="1" @if($menu->display==1) checked="checked" @endif>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Importan Link</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" class="form-control" name="important_link"  value="important_link" @if($menu->important_link=='important_link') checked="checked" @endif>
                                            </div>
                                        </div>





                                        <a href="" class="btn btn-danger">Back</a>
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

@endsection

<script>
function ajaxSearch(keywords,id,colid)
{
	//alert(keywords+id+colid);
	if(keywords==0 ){
		return false;
	}
	else{
		  var surl = '{{ route("Menusearchajax") }}';
		  $.ajax({ 
			type: "GET", 
			url: surl,  
			data: {'keywords':keywords,'colid':colid},
			
			cache: false,
			beforeSend: function(){
				$('#LoadingImageE').show();
			},
			complete: function(){
				$('#LoadingImageE').hide();
			},
			success: function(response) { 
				  $('#'+id).html(response);
				  //$("#LoadingImageE").hide();
			}, 
			error: function (xhr, status) {  
			  $("#LoadingImageE").hide();
			  alert('Unknown error ' + status); 
			}    
		  });
	} 
}
</script>