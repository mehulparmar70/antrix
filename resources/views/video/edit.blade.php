@extends('adm.layout.admin-index')
@section('title','Edit Video')

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
    
    $('.delete-form').attr('action','/admin/video/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});



$(".video").addClass( "menu-is-opening menu-open");
$(".video a").addClass( "active-menu");

</script>

@endsection
@section('content')



<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        
      <div class="row">
      
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Video</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('video.create')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Video </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Edit Video</h1>
          </div>
        </div>
</div>

      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
        
          <div class="card-body">
            <div class="form-horizontal row">
            
            <div class="col-md-12">
                 
              <form enctype="multipart/form-data" method="post" class="form-horizontal"  
                action="{{route('video.update', $video->id)}}">
                @csrf
                @method('PUT')

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="title">Video Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Video Title" value="@if(old('title')){{old('title')}}@else{{$video->title}}@endif">
                      <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="short_description">Short Desctiption</label>
                      <textarea type="text" class="form-control" name="short_description" 
                         placeholder="Video Short Desctiption">@if(old('short_description')){{old('short_description')}}@else{{$video->short_description}}@endif</textarea>
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  
                    
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="youtube_embed">Youtube Embed Code</label>
                      <textarea type="text" class="form-control" name="youtube_embed" 
                         placeholder="Video Short Desctiption">@if(old('youtube_embed')){{old('youtube_embed')}}@else{{$video->youtube_embed}}@endif</textarea>
                         
                    <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
                    </div>
               
                    <div class="col-sm-6">
                      <label for="video_date">Video Date</label>
                      <input type="date" class="form-control" name="video_date" 
                         placeholder="Video Date" value="@if(old('video_date')){{old('video_date')}}@else{{$video->video_date}}@endif">
                         
                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                      </div>
                    </div>
                    

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          onClick="updateStatus({{$video->id}})"
                          @if($video->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($video->status == 0)
                        <h5> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	
          

                  
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save Video</button>
                </div>

              </div>
              </form>
              </div>



          </div>
        </div>


      </div>
    </section>
  </div>

  @endsection
