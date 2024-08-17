@extends('adm.layout.admin-index')
@section('title','ALL INFLATABLES')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_form = $(this).attr('data-form');
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_form);

    $('.delete-title').html(data_title);
    $('.delete-id').val(delete_id);
  });  
});
$(".setting").addClass( "menu-is-opening menu-open");
$(".setting a").addClass( "active-menu");


$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            updateOrder(selectedData);

        }
  });

  function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'top_inflatable'},
      success:function(result){
        console.log(result);
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'top_inflatable'},
      success:function(result){
        console.log(result);
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
              <li class="breadcrumb-item active">Custom Javascript</li>
            </ol>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="col-sm-6">
            <h3 class="mb-0">Custom Javascript</h3>
          </div>
    </div>
    
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
        
        <div class="col-md-6 card card-dark">
              <div class="card-header">
                      <h3 class="card-title">Header Js</h3>
                </div>
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('custom-code.store')}}">
                  @csrf
                  <div class="card-body p-2 pt-4">
                  <input type="hidden" name="type" value="header-code">
                   <div class="form-group row">
                      <div class="col-sm-12">
                            <textarea name="description" class="form-control" rows="14" cols="14" 
                            placeholder="Paste your js code here">{{$headerJs->description}}</textarea>
                            <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-dark">Save Header Code</button>
                  </div>
                </form>

              </div>

            <div class="col-md-6 card card-dark">
              <div class="card-header">
                      <h3 class="card-title">Footer Js</h3>
                </div>
                <form method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('custom-code.store')}}">
                  @csrf
                  <div class="card-body p-2 pt-4">
                  <input type="hidden" name="type" value="footer-code">
                   <div class="form-group row">
                      <div class="col-sm-12">
                            <textarea name="description"  class="form-control" rows="14" 
                            cols="14" placeholder="Paste your js code here">{{$footerJs->description}}</textarea>
                            <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-dark">Save Footer Code</button>
                  </div>
                </form>

              </div>
            </div>


      </div>
    </section>
  </div>
  
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete ALL INFLATABLES</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label>Inflatable Name</label>
            <h5 class="modal-title delete-title">Delete Top Inflatable</h5>
            </div>
            <div class="modal-footer justify-content-between d-block ">
              
            <form class="delete-form float-right" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" class="delete-id" name="id" >
                    <input type="hidden" class="table" name="table" value="top_inflatable" >
                    
              <button type="button" class="btn btn-default mr-4" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger float-right" title="Delete Record"><i class="fas fa-trash-alt"></i> Delete</button>
              

            </form>
            </div>
          </div>
        </div>
      </div>

  @endsection

  