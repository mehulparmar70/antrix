@extends('adm.layout.admin-index')
@section('title','Slider Manage')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')


<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    var data_image = $(this).attr('data-image');
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});


$(".slider").addClass( "menu-is-opening menu-open");
$(".slider a").addClass( "active-menu");

</script>
<script type="text/javascript">

$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            updateOrder(selectedData);

          toastr.success('Slider Order Updated...')
        }
  });


function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/slider/update-status",
      type:'post',
      data:{position:data},
      success:function(result){
        console.log(result);
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'slider'},
      success:function(result){
        // console.log(result);
        location.reload();

      }
  })
}
</script>
@endsection

@section('content')
@include('adm.widget.table-search-draggable')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New : Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Sliders</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-body">
            <div class="form-horizontal row">
            
            <div class="col-md-4 card card-theme">
              <div class="card card-theme">
              <div class="card-header">
                <h3 class="card-title">Add New Slider</h3>
                <div id="example1_wrapper">

                </div>
              </div>
             
              <form method="post" enctype="multipart/form-data"  class="form-horizontal" action="{{route('slider.store')}}">
                @csrf
                <input type="hidden" id="page_type" value="singleUpload">
                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <input type="hidden" class="form-control">
                      
                      <input type="text" class="form-control" name="title"
                         placeholder="Slider Title" value="{{old('title')}}">
                         
                      <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                  </div> 
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea class="form-control" name="description"
                         placeholder="Slider Alt Text / Description">{{old('description')}}</textarea>

                      <span class="text-danger">@error('description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="url" class="form-control" name="url"
                         placeholder="Slider Url" value="{{old('url')}}">

                      <span class="text-danger">@error('url') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="file" class="file_input" 
                      name="image" placeholder="Slider Image" required
                         accept="image/png,image/jpeg,image/webp" />
                      <br>
                      <span class="text-danger col-12">@error('image') {{$message}} @enderror</span>

                        <p class="text-danger">
                          Image size for should be( 1351Px   X   700Px ).<br>
                          Supportable Format: JPG,JPEG,PNG,WEBP
                        </p>
                        <img class="elevation-2 perview-img"   width="120"src="{{asset('adm')}}/img/no-item.jpeg">
                      </div>
                  </div>
                  
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                      checked
                        />
                        
                      <h5> <span class="badge badge-success">Active</span></h5>
                      
                      </td>
                  </div>	
                  
                  </div>
                </div>

                <div class="card-footer">
                  @if(request()->get('onscreenCms') == 'true')
                    <button type="submit" class="btn btn-info btn-save" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Slider & Close</button>
                  @else                  
                    <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Slider</button>
                  @endif
                </div>
              </form>
            </div>

            
            <div class="col-md-8 card card-theme">
              <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Slider List</h3>
              </div>
              
            <div class="card">
              <div class="card-body">
                <table id="example2 " class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody class="row_position">
                    @foreach($sliders as $key => $slider)
                      <tr id="{{$slider->id}}">
                      <td>{{$slider->slider_no}}</td>
                        <td><img width="100" src="{{url('web')}}/media/sm/{{$slider->image}}"></td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->description}}</td>
                        <td>
                        
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="0" id="exampleCheck1"

                              onClick="updateStatus({{$slider->id}})"
                              @if($slider->status == 1)checked
                              @endif 
                              @if(old('status'))checked
                              @endif
                              />
                              
                        @if($slider->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                        
                          </div>	
                          

                        <td>
                        
                          <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit slider"><i class="far fa-edit"></i></a>
                          {{-- <a href="{{route('slider-image.edit',$slider->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Upload slider Images"><i class="far fa-edit"></i></a> --}}
                          <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete slider"  data-id="{{route('admin.index')}}/slider/{{$slider->id}}" 
                            data-image="{{url('web')}}/media/sm/{{ $slider->image}}" data-title="{{ $slider->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                          </button>
                      
                      
                      </td>

                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            </div>

            
          </div>

        </div>


      </div>
    </section>
  </div>


  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Slider</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Slider Name</label>
            <h5 class="modal-title delete-title">Delete Slider</h5>
            <img  class="col-md-8 modal-title delete-data-image" src="">
            </div>
            <div class="modal-footer justify-content-between d-block ">
              
            <form class="delete-form float-right" action="" method="POST">
                    @method('DELETE')
                    @csrf
              <button type="button" class="btn btn-default mr-4" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger float-right" title="Delete Record"><i class="fas fa-trash-alt"></i> Delete</button>
              

            </form>
            </div>
          </div>
        </div>
      </div>


  @endsection