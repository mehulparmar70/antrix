@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

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
              <li class="breadcrumb-item active">Add New Video</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('video.index')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Manage Video </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Video</h1>
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
                action="{{route('video.store')}}">
                @csrf

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="title">Video Title</label>
                      <input type="text" class="form-control" name="title" 
                         placeholder="Video Title" value="{{old('title')}}">
                         
                      <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="video_date">Video Date</label>
                      <input type="date" class="form-control" name="video_date" 
                         placeholder="Video Date" value="{{old('video_date')}}">
                         
                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                      </div>
                  </div>
                  
                    
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="short_description">Short Desctiption</label>
                      <textarea type="text" class="form-control" name="short_description" 
                         placeholder="Video Short Desctiption">{{old('short_description')}}</textarea>
                         
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-6">
                      <label for="youtube_embed">Youtube Embed Code</label>
                      <textarea type="text" class="form-control" name="youtube_embed" 
                         placeholder="Video Short Desctiption">{{old('youtube_embed')}}</textarea>
                         
                    <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
                    </div>

                    </div>
                    

                  
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status" value="1" id="exampleCheck1" checked/>
                      <label class="form-check-label"  for="exampleCheck1">Publish</label>
                    </div>	 -->
                  
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="status" 
                         id="exampleCheck1"
                        checked
                          />
                          
                        <h5> <span class="badge badge-success">Active</span></h5></td>
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
