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
    
    $('.delete-form').attr('action','/admin/Blog/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".partners").addClass( "menu-is-opening menu-open");
$(".partners a").addClass( "active-menu");

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
              <li class="breadcrumb-item active">Add New Partners</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('partners.index')}}" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Manage Partners </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Partners</h1>
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
                action="{{route('partners.store')}}">
                @csrf
                <div class="row">
                  <div class="col-sm-4">
                    <label for="title">Add Partners Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Partners Title" value="{{old('title')}}" required>
                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                  </div>
                  <div class="col-sm-4">
                    <label for="title">Add Partners Short Description</label>
                    <input type="text" class="form-control" name="short_description" placeholder="Partners Short Description" value="{{old('short_description')}}" required>     
                    <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                  </div>
                  <div class="col-sm-4">
                    <label for="title">Add Partners Page Url</label>
                    <input type="text" class="form-control" name="slug" placeholder="Url" value="{{old('slug')}}" required>     
                    <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                  </div>
                  <div class="col-sm-12 mt-3">
                    <label for="full_description">Add Partners Description</label>
                    <textarea id="editor" name="full_description" placeholder="Partners Descriptions">{{old('full_description')}}</textarea>                  
                    <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <div class="col-sm-6 col-md-6">
                    <div class="col-sm-12">
                      <label for="image_alt">Add Partners Image</label><br>
                      <input type="hidden" id="page_type" value="singleUpload">
                      <input type="file" name="image" class="file_input" id="image" require accept="image/png,image/jpeg,image/webp" required/>
                      <br>
                      <img class="elevation-2 perview-img"   width="120"src="{{asset('adm')}}/img/no-item.jpeg">
                      <span class="text-danger">@error('image') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12 row">
                      <div class="col-sm-6">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt"  placeholder="Partners Image Alter Text (SEO)"  value="{{old('image_alt')}}">
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      <div class="col-sm-6">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" placeholder="Partners Image Title (SEO)" value="{{old('image_title')}}">
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="col-sm-12 mb-2  p-0">
                      <label class="text-dark" for="search_index">Add SEO CONTENTS</label>
                      <input type="text" class="form-control" name="meta_title"placeholder="Seo Title" value="{{old('meta_title')}}"> 
                      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12 mb-2  p-0">
                      <input type="text" class="form-control" name="meta_keyword"placeholder="Seo Keywords with ," value="{{old('meta_keyword')}}"> 
                      <span class="text-danger">@error('meta_keyword') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-12 mb-2  p-0">
                      <textarea type="text" class="form-control" name="meta_description"placeholder="Seo Description">{{old('meta_description')}}</textarea> 
                      <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
                    </div>
                    <div class="row col-sm-12">
                      <div class="col-sm-6">
                        <label  class="text-dark" class="text-dark" for="search_index">Allow search engines?</label>
                        <select class="form-control col-sm-5" name="search_index">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                      </div>
                      
                      <div class="col-sm-6">
                        <label  class="text-dark" class="text-dark" for="search_follow">Follow links?</label>
                        <select class="form-control col-sm-5" name="search_follow">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                      <label  class="" for="canonical_url">Canonical URL</label>
                      <input type="text" class="form-control" name="canonical_url" placeholder="Canonical URL" >
                      <span class="text-danger"></span>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input  pull-right" name="status"id="exampleCheck1"checked />
                        <h5> <span class="badge badge-success">Active</span></h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  @if(request()->get('onscreenCms') == 'true')
                  <button type="submit" class="col-sm-4 btn btn-info btn-save mr-2" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save Partners & Close</button>
                  @else
                  <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save Partners</button>
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
