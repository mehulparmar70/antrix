@extends('adm.layout.admin-index')
@section('title','Page Links')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>


<script>
$(".footer-url").addClass( "menu-is-opening menu-open");
$(".footer-url a").addClass( "active-menu");

$( document ).ready(function() {

$(".footer-url").addClass( "menu-is-opening menu-open");
$(".footer-url a").addClass( "active-menu");

  $(".del-modal").click(function(){
    var delete_form = $(this).attr('data-form');
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_form);

    $('.delete-title').html(data_title);
    $('.delete-id').val(delete_id);
    $('.delete-slug').val(data_slug);
  });  
});

$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
           
          }
  });

  function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'url_list'},
      success:function(result){
        console.log(result);
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'url_list'},
      success:function(result){
        location.reload();
      }
  })
}



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
              <li class="breadcrumb-item active">Edit Footer Page Link</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Edit Footer Page Link</h1>
          </div>
        </div>
    </div>

      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">

          <div class="col-md-5 card card-theme">
              <div class="card-header">
                      <h3 class="card-title">Edit Page Link</h3>
                </div>
                
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('admin.pageLink.update')}}">

                  @csrf

                  <div class="card-body p-2 pt-4">
                  <label for="name">Display Name</label>
                  <input type="text" name="name" class="form-control"
                  value="@if(old('name')){{old('name')}}@else{{$pageLink->name}}@endif">
                
                  <input type="hidden" name="type" value="page_link">
                    <input type="hidden" name="form_type" value="edit">
                    <input type="hidden" name="id" value="{{$pageLink->id}}">

                  <label for="name">Url</label>
                  <input type="url" name="url" class="form-control"
                  value="@if(old('url')){{old('url')}}@else{{$pageLink->url}}@endif">
                         

                      <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          @if($pageLink->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($pageLink->status == 0)
                        <h5> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	
          

                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-dark">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;&nbsp;Update Page Link</button>
                  </div>
                </form>

              </div>
           
           <div class="col-md-7 card card-theme">
              <div class="card-header">
                      <h3 class="card-title">Page Links Lists</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th width="300">Name</th>
                        <th width="300">Url</th>
                        <th>Status</th>
                        <th width="100">Action</th>
                      </tr>
                    </thead>
                    <tbody class="row_position">
                      @foreach($pageLinks as $i => $pageLink)
                        <tr id="{{$pageLink->id}}">
                          <td>{{$pageLink->item_no}}</td>
                          <td>{{$pageLink->name}}</td>
                          <td>{{$pageLink->url}}</td>
                          <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          onClick="updateStatus({{$pageLink->id}})"
                          @if($pageLink->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($pageLink->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	
                    
                        
                        </td>
                          <td>
                         
                         
                          <a href="{{route('admin.pageLink.create')}}?type=edit&id={{$pageLink->id}}" class="btn btn-xs btn-info float-left mr-2" title="Edit Page Link"><i class="far fa-edit"></i></a>
                            <button class="btn btn-xs btn-danger del-modal float-left" title="Delete pageLink" data-id="{{$pageLink->id}}"
                             data-form="{{route('admin.blockControl.delete')}}" data-title="{{ $pageLink->name}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                            </button>                      
                        </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                  
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
              <h4 class="modal-title">Delete Page Links</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Item Name</label>
            <h5 class="modal-title delete-title">Delete Page Link</h5>
            </div>
            <div class="modal-footer justify-content-between d-block ">
              
            <form class="delete-form float-right" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" class="delete-id" name="id" >
                    <input type="hidden" class="table" name="table" value="url_list" >
                    <input type="hidden" class="delete-slug" name="data_slug" value="page" >
                    
              <button type="button" class="btn btn-default mr-4" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger float-right" title="Delete Record"><i class="fas fa-trash-alt"></i> Delete</button>
              

            </form>
            </div>
          </div>
        </div>
      </div>

  @endsection

  