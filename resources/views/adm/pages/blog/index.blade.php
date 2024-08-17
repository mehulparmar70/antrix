@extends('adm.layout.admin-index')
@section('title','Blog Manage')

@section('toast')
  @include('adm.widget.toast')
@endsection
<style>

.width-150{
    max-width: 150px !important;
    width: 150 !important;
    height: auto !important;
}.width-300{
    max-width: 300px !important;
    width: 300 !important;
    height: auto !important;
}

</style>
@section('custom-js')

<script src="{{url('adm')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('adm')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{url('adm')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('adm')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('adm')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('adm')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>



<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action',delete_id);
    $('.delete-title').html(data_title);
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
      data:{position:data, table: 'blog'},
      success:function(result){
        toastr.success('Blog Order Updated...')
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'blog'},
      success:function(result){
        location.reload();
      }
  })
}

$(".blog").addClass( "menu-is-opening menu-open");
$(".blog a").addClass( "active-menu");

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
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
              <li class="breadcrumb-item active">Blog List</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('blog.create')}}?type=main_category" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Blog </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Blog List</h1>
          </div>
        </div>
    </div>


      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-body table-responsive p-0">
                <table  id="example1" class="table table-bordered table-striped" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th width="200">slug</th>
                      <th>Status</th>
                      <th width="140">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody class="row_position">
                    @foreach($blogs as $i => $blog)
                      <tr id="{{$blog->id}}"> 
                        <td>{{$blog->item_no}}</td>

                        @if(isset($blog->image))
                        <td><img class="rounded object-fit"  width="150"
                          src="{{asset('web')}}/media/sm/{{$blog->image}}"></td>
                          @else

                        <td><img class="rounded"    width="100"
                          src="{{asset('adm')}}/img/no-item.jpeg"></td>
                          @endif

                        <td>{{$blog->title}}</td>
                        <td class="width-150">{{$blog->slug}}</td>
                        <td>
                        
                    <div class="form-check">
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
                    </td>
                        <td width="150">
                        
                          <a target="_blank" href="{{url('blog')}}/{{$blog->slug}}" class="btn btn-sm btn-warning float-left mr-2"  title="Edit Blogs"><i class="fa fa-eye"></i></a>
                          <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-sm btn-dark float-left mr-2"  title="Edit Blogs"><i class="far fa-edit"></i></a>
                           <button class="btn btn-sm btn-danger del-modal float-left"  title="Delete Blog"  data-id="{{route('admin.index')}}/blog/{{$blog->id}}" data-title="{{ $blog->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
              <h4 class="modal-title">Delete Blog</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Blog Title</label>
            <h5 class="modal-title delete-title">Delete Blog</h5>
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

  