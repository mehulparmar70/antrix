@extends('layout.admin-index')
@section('title','Blog Page Editor')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>


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
              <li class="breadcrumb-item active">Industries Page Manage</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="mb-2">
          <div class="col-sm-12">
            <h3 class="mb-0">Industries Page Manage</h3>
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
              <div class="card">
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <div class="card-body p-2">

                    <div class="form-group row">
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$pageData->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      <div class="col-sm-12">
                          <textarea id="editor" name="description" placeholder="Blog Descriptions">
                          {{$pageData->description}}</textarea>
                          <span class="text-danger">@error('description') {{$message}} @enderror</span>
                        </div>
                    <input type="hidden" name="type" value="industrie_page">               
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12 row">
                        <div  class="col-sm-6">
                          @include('widget.seo-content')
                          <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                        </div>
                        <div  class="col-sm-6">
                          @include('widget.seo-content-2')
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-center">

                    <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Data</button>
                  
                  </div>
                </form>
            </div>

        </div>


      </div>
    </section>
  </div>

  @endsection