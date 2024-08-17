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
    
    $('.delete-form').attr('action','/admin/blog/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".blog").addClass( "menu-is-opening menu-open");
$(".blog a").addClass( "active-menu");

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
              <li class="breadcrumb-item active">Edit Update</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right"><a href="{{route('blog.create')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Update </a>

              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Edit Update</h1>
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
                  action="{{route('blog.update', $blog->id)}}">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="title">Edit Update Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Blog Title" value="@if(old('title')){{old('title')}}@else{{$blog->title}}@endif" required>
                      <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-4">
                      <label for="title">Edit Update Short Description</label>
                      <input type="text" class="form-control" name="short_description" placeholder="Blog Short Description" value="@if(old('short_description')){{old('short_description')}}@else{{$blog->short_description}}@endif" required>     
                      <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-4">
                      <label for="title">Edit Update Page Url</label>
                      <input type="text" class="form-control" name="slug" placeholder="Url" value="@if(old('short_description')){{old('short_description')}}@else{{$blog->short_description}}@endif" required>     
                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12 mt-3">
                      <label for="full_description">Edit Update Description</label>
                      <input type="hidden" id="full_description" value="@if(old('full_description')){{old('full_description')}}@else{{ $blog->full_description }}@endif">
                      <textarea id="editor" name="full_description" placeholder="Blog Descriptions" maxlength = "1">@if(old('full_description')){{old('full_description')}}@endif</textarea>                  
                      <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <div class="col-sm-6 col-md-6">
                      <div class="col-sm-12">
                        <label for="image_alt">Edit Update Image</label><br>
                        <input type="hidden" id="page_type" value="singleUpload">
                        <input type="file" name="image" class="file_input " id="image" accept="image/png,image/jpeg,image/webp"/>
                        <br>
                        <div class="col-8">
                          <input type="hidden" name="old_image" value="{{$blog->image}}">
                          <?php $fileName = public_path().'/web/media/xs/'.$blog->image; ?>
                          @if(!file_exists($fileName))
                              <img class="elevation-2 perview-img"  height="120" src="{{asset('adm')}}/img/no-item.jpeg">
                          @elseif($blog->image)
                              <!-- <img class="mt-2 elevation-2 perview-img"  height="120"src="{{asset('web')}}/media/xs/{{$blog->image}}"> -->
                              <div class="image-area">
                              <img class="elevation-2 perview-img"  height="120"src="{{asset('web')}}/media/xs/{{$blog->image}}"> 
                              <a class="remove-image" href="#" data-id="{{ $blog->id }}" data-table="blogs" data-field="image" data-url="{{url('api')}}/media/image-delete/{{$blog->id}}" style="display: inline; position: absolute; top: -10px; border-radius: 10em; padding: 2px 6px 3px; text-decoration: none; font: 700 21px/20px sans-serif;left: 105px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                          @else
                              <img class="elevation-2 perview-img"  height="120" src="{{asset('adm')}}/img/no-item.jpeg">
                          @endif
                        </div>
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                      </div>
                      <div class="col-sm-12 row">
                        <div class="col-sm-6">
                          <label for="image_alt">Image Alt</label>
                          <input type="text" class="form-control" name="image_alt"  placeholder="Blog Image Alter Text (SEO)"  value="@if(old('image_alt')){{old('image_alt')}}@else{{$blog->image_alt}}@endif">
                          <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                          <label for="image_title">Image Title</label>
                          <input type="text" class="form-control" name="image_title" placeholder="Blog Image Title (SEO)" value="@if(old('image_title')){{old('image_title')}}@else{{$blog->image_title}}@endif">
                          <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="col-sm-12 mb-2  p-0">
                        <label class="text-dark" for="search_index">Add SEO CONTENTS</label>
                        <input type="text" class="form-control" name="meta_title"placeholder="Seo Title" value="@if(old('meta_title')){{old('meta_title')}}@else{{$blog->meta_title}}@endif"> 
                        <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                      </div>
                      <div class="col-sm-12 mb-2  p-0">
                        <input type="text" class="form-control" name="meta_keyword"placeholder="Seo Keywords with ," value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$blog->meta_keyword}}@endif"> 
                        <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                      </div>
                      <div class="col-sm-12 mb-2  p-0">
                        <textarea type="text" class="form-control" name="meta_description"placeholder="Seo Description">@if(old('meta_description')){{old('meta_description')}}@else{{$blog->meta_description}}@endif</textarea> 
                        <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                      </div>
                      <div class="row col-sm-12">
                        <div class="col-sm-6">
                          <label  class="text-dark" class="text-dark" for="search_index">Allow search engines?</label>
                          <select class="form-control col-sm-5" name="search_index">
                              <option value="1" @if($blog->search_index == 1) selected @endif>Yes</option>
                              <option value="0" @if($blog->search_index == 0) selected @endif>No</option>
                          </select>
                        </div>
                        
                        <div class="col-sm-6">
                          <label  class="text-dark" class="text-dark" for="search_follow">Follow links?</label>
                          <select class="form-control col-sm-5" name="search_follow">
                              <option value="1" @if($blog->search_follow == 1) selected @endif>Yes</option>
                              <option value="0" @if($blog->search_follow == 0) selected @endif>No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 mt-3">
                        <label  class="" for="canonical_url">Canonical URL</label>
                        <input type="text" class="form-control" name="canonical_url" placeholder="Canonical URL" value="@if(old('canonical_url')){{old('canonical_url')}}@else{{$blog->canonical_url}}@endif">
                        <span class="text-danger"></span>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-check mt-4">
                          <input type="checkbox" class="form-check-input  pull-right" name="status" 
                            id="exampleCheck1"
                            
                              onClick="updateStatus({{$blog->id}})"
                              @if($blog->status == 1)checked
                              @endif 
                              @if(old('status'))checked
                              @endif
                              />
                              
                            @if($blog->status == 0)
                            <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    @if(request()->get('onscreenCms') == 'true')
                    <button type="submit" class="col-sm-4 btn btn-info btn-save mr-2" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Update Updates & Close</button>
                    @else
                    <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>Update Updates</button>
                    @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
