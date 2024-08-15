@extends('adm.layout.admin-index')
@section('title','ALL INFLATABLES Editor')

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
              <li class="breadcrumb-item active">Home Page Manage</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="mb-2">
          <div class="col-sm-12">
            <h3 class="m-0">Home Page Manage</h3>
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
             
                <form method="post" enctype="multipart/form-data" 
                class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <input type="hidden" name="type" value="home_page">             
                  <div class="card-body p-2">
                    <div class="form-group row">
                      
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$homeAbout->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      
                      <div class="col-sm-12">
                          <label class="text-dark" for="search_index">Home Page Description</label>
                          <textarea id="editor" name="description" placeholder="Product Descriptions">
                          {{$homeAbout->description}}</textarea>
                      </div> 
                    </div>
                    <div class="form-group row col-sm-12">
                      <div  class="col-sm-6">
                        @include('adm.widget.seo-content')

                        <label for="url">Page Url</label>
                        <input type="url" class="form-control" name="url" placeholder="Aboutus Page Url" value="{{$homeAbout->url}}">
                        <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                      </div>
                      <div  class="col-sm-6">
                        @include('adm.widget.seo-content-2')
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
            
            <!-- <div class="col-md-6 card card-theme">
                <div class="card card-theme">
                    <div class="card-header">
                        <h3 class="card-title">Click & Explore</h3>
                    </div>
                
                  <form method="post" class="form-horizontal" action="{{route('admin.url-list1.store')}}">
                      @csrf
                      <div class="card-body p-2 pt-4">
                      <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="hidden" name="type" value="home_url1">
                          
                          <input type="text" class="form-control" name="title"
                              placeholder="Url Title">
                              
                          <span class="text-danger">@error('title') {{$message}} @enderror</span>
                          </div>
                      </div> 
                      
                      <div class="form-group row">
                          <div class="col-sm-12">
                          <select name="target" class="form-control" id="">
                              <option value="_self">Open in Same Page (Default)</option>
                              <option value="_blank">Open in New Tab</option>
                          </select>
                          <span class="text-danger">@error('target') {{$message}} @enderror</span>
                          </div>
                      </div>
                      
                          <div class="form-group row">
                              <div class="col-sm-12">
                              <input type="url" class="form-control" name="url"
                                  placeholder="Url link">
                              <span class="text-danger">@error('url') {{$message}} @enderror</span>
                              </div>
                          </div>


                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input status-switch" 
                            name="status" value="0" id="customSwitch1">
                          <label class="custom-control-label float-right" for="customSwitch1">Status</label>
                        </div>
                      </div>

                      </div>
                      </div>

                      <div class="card-footer">
                      <button type="submit" class="btn btn-dark">Save Slider</button>
                      </div>
                  </form>
                </div>

                
                <div class="col-md-6 card card-theme">
                  <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ALL INFLATABLES List</h3>
                    </div>
                
                    <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($homeUrls1 as $homeUrl1)
                            <tr>
                                <td>{{$homeUrl1->title}}</td>
                                <td  style="max-width: 270px;">{{$homeUrl1->url}}</td>
                                <td>@if($homeUrl1->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                                
                                <td>
                                
                                <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete homeUrl1"  data-id="{{ $homeUrl1->id}}" 
                                    data-url="{ $homeUrl1->url}}" data-title="{{ $homeUrl1->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                                </button>
                            
                            
                            </td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                        
                    </div>
                    </div>


                </div>
              </div>

             </div> -->


      </div>
    </section>
  </div>


  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete URL</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>URL Title</label>
            <h5 class="modal-title delete-title">Url Title</h5>
            
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