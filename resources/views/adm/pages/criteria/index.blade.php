@extends('adm.layout.admin-index')
@section('title','Dashboard - Charotar Corporation')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>

<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
  });  
});


$(".criteria").addClass( "menu-is-opening menu-open");
$(".criteria a").addClass( "active-menu");

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

        toastr.success('Photo Order Updated...')
        }
  });


  function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'criteria'},
      success:function(result){
        console.log(result);
      }
  })
}


function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'criteria'},
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


      <div class="row">
      
      <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Criteria</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('admin.criteria.meta.index')}}" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Assign Criteria </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Criteria</h1>
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
            
            <div class="col-md-4 card card-theme">
              <div class="card card-theme">
              <div class="card-header">
                <h3 class="card-title">Upload Criteria</h3>
                <div id="example1_wrapper">

                </div>
              </div>
             
              <form method="post" enctype="multipart/form-data"  class="form-horizontal"
               action="{{route('criteria.store')}}">
                @csrf

                <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <input type="hidden" class="form-control">
                      
                      <input type="text" class="form-control" name="title"
                         placeholder="Criteria Title" required value="{{old('title')}}">
                         
                      <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                  </div> 
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="slug" class="form-control" name="slug"
                         placeholder="Criteria Slug" value="{{old('slug')}}" required>

                      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea class="form-control" name="youtube_embed"
                         placeholder="Add Youtube Embed Code"></textarea>

                      <span class="text-danger">@error('youtube_embed') {{$message}} @enderror</span>
                    </div>
                  </div> -->
                  
                  
                    
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                      checked
                        />
                        
                      <h5> <span class="badge badge-success">Active</span></h5></td>
                  </div>	
                  
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Save Criteria</button>
                </div>
              </form>
            </div>

            
            <div class="col-md-8 card card-theme">
              <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Criteria List</h3>
              </div>
              
            <div class="card">
              <div class="card-body">
                <table id="example2 " class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody class="row_position">
                    @foreach($criterias as $key => $criteria)
                      <tr id="{{$criteria->id}}">
                      <td>{{$criteria->item_no}}</td>
                        <td>{{$criteria->title}}</td>
                        <td>{{$criteria->slug}}</td>
                        <td>
                        
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="0"
                             id="exampleCheck1"

                              onClick="updateStatus({{$criteria->id}})"
                              @if($criteria->status == 1)checked
                              @endif 
                              @if(old('status'))checked
                              @endif
                              />
                              
                        @if($criteria->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                        
                          </div>	
                          
                        <td>
                        
                          <a href="{{route('criteria.edit',$criteria->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit Criteria"><i class="far fa-edit"></i></a>
                          {{-- <a href="{{route('Criteria-image.edit',$criteria->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Upload Criteria Images"><i class="far fa-edit"></i></a> --}}
                          <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete Criteria"  data-id="{{route('admin.index')}}/criteria/{{$criteria->id}}" 
                            data-image="{{url('web')}}/media/sm/{{ $criteria->image}}" data-title="{{ $criteria->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                          </button>
                      
                      
                      </td>

                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
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
              <h4 class="modal-title">Delete Criteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Criteria Name</label>
            <h5 class="modal-title delete-title">Delete Criteria</h5>
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