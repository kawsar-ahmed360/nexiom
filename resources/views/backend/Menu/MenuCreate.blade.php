@extends('backend.master')

@section('title','Add Menu')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Menu</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Menu
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('MenuStore')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" placeholder="Menu Name" />
                                            @error('menu_name')
                                               <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label>Parent Menu</label>
                                           <div>
                                           		<select name="root_id" class="form-control"  onchange="ajaxSearch(this.value,'subcatid','root_id')">
                                                 <option>Select Menu</option>
                                                @foreach($main as $main_menu)
                                                   <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div>
                                        	<div id="LoadingImageE" style="width:100%; height:auto; text-align:left;display:none; ">
                                            <img src="{{ asset('public/admin/assets/img/loader7.gif')}}" style="width:30px; height:auto" /></div>
                                        </div>

                                        </div>


                                        <div class="form-group">
                                            <label>Sub Menu</label>
                                            <div id="subcatid">
                                           	 <select name="sroot_id" class="form-control">
                                                <option value="">Sub Menu</option>

                                            @foreach($sub_main as $sub_menu)

                                                    <option value="{{$sub_menu->id}}">{{$sub_menu->menu_name}}</option>

                                                @endforeach

                                            </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Last Menu</label>
                                        <div id="lastcatid">
                                            <select name="troot_id" class="form-control">
                                                <option value="">Last Menu</option>

                                             @foreach($sroot_main as $sroot_menu)

                                                    <option value="{{$sroot_menu->id}}">{{$sroot_menu->menu_name}}</option>

                                                @endforeach
                                            </select>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Type</label>
                                            <select name="page_type" class="form-control" onChange="">
                                                <option value="">Page Type</option>

                                                <option value="page">Page</option>
                                                <option value="Service">Service</option>
                                                <option value="gallery">Picture Gallery</option>
                                                <option value="video">Video Gallery</option>
                                                <option value="contact">Contact Us</option>
                                                <option value="url">Url</option>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>External Link</label>
                                            <input class="form-control" name="external" placeholder="External Link" />

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
                                                <input type="checkbox" class="form-control" name="display"  value="1">
                                            </div>

                                            <label>Footer</label>
                                            <div>
                                                <input type="checkbox" class="form-control" name="footer1"  value="1">
                                            </div>

                                        </div> --}}


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Top Menu</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" class="form-control" name="display"  value="1">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Importan Link</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" class="form-control" name="important_link"  value="important_link">
                                            </div>
                                        </div>

                                       
                                        <button type="submit" class="btn btn-primary">Submit</button>

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