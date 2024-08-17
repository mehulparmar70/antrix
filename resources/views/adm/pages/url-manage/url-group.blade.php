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


$(".footer-url").addClass( "menu-is-opening menu-open");
$(".footer-url a").addClass( "active-menu");

</script>
@endsection

@section('content')
@include('adm.widget.table-search-draggable')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Url Group Manage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Url Group Manage</li>
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
            
                <div class="col-md-6 card card-theme">
                    <div class="card card-theme">
                    <div class="card-header">
                        <h3 class="card-title">Url Group Add</h3>
                    </div>
                
                <form method="post" class="form-horizontal" action="{{route('admin.url-list1.store')}}">
                    @csrf
                    <div class="card-body p-2 pt-4">
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <input type="hidden" name="type" value="home_url1">
                        
                        <input type="text" class="form-control" name="name"
                            placeholder="Group Name">
                            
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
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
                                placeholder="Group link">
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
                    <h3 class="card-title">Url Group List</h3>
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
                            @foreach($urlGroups as $urlGroup)
                            <tr>
                                <td>{{$urlGroup->title}}</td>
                                <td  style="max-width: 270px;">{{$urlGroup->url}}</td>
                                <td>@if($urlGroup->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                                
                                <td>
                                
                                <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete urlGroup"  data-id="{{ $urlGroup->id}}" 
                                    data-url="{ $urlGroup->url}}" data-title="{{ $urlGroup->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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

        </div>


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