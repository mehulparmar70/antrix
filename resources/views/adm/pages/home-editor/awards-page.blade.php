@extends('adm.layout.admin-index')
@section('title','Contact Page Editor')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    var data_url = $(this).attr('data-url');
    
    $('.delete-form').attr('action','/admin/url-list1/delete/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-url').attr('src',data_url);
  });  
});


$(".page").addClass( "menu-is-opening menu-open");
$(".page a").addClass( "active-menu");

</script>
@endsection

@section('content')
@include('adm.widget.table-search-draggable')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">

      <div class="row">
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Award Page Manage</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="mb-2">
          <div class="col-sm-12">
            <h3 class="mb-0">Award Page Manage</h3>
          </div>
        </div>
    </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="">
            <div class="form-horizontal row">
            
            <div class="col-md-12 card card-theme">
              <div class="card card-theme">
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf
                  <div class="card-body p-2">
                    <div class="form-group row">
                      <div class="col-sm-8 mt-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$pageData->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      <div class="col-sm-12">
                        <label for="description">Newsletter Description</label>
                          <textarea id="editor" name="description" placeholder="Descriptions">
                          {{$pageData->description}}</textarea>
                          <span class="text-danger">@error('description') {{$message}} @enderror</span>
                        </div>
                    <input type="hidden" name="type" value="award_page">               
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12 row">
                        <div  class="col-sm-6">
                          @include('adm.widget.seo-content')
                          <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                        </div>
                        <div  class="col-sm-6">
                          @include('adm.widget.seo-content-2')
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-center">
                    @if(request()->get('onscreenCms') == 'true')
                      <button type="submit" class="btn btn-info btn-save" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save & Close</button>
                    @else
                      <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Data</button>
                    @endif
                  
                    
                  </div>
                </form>
            </div>

        </div>


      </div>
    </section>
  </div>

  @endsection