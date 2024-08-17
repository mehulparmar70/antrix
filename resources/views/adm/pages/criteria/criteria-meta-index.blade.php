@extends('adm.layout.admin-index')
@section('title','Criteria Meta')

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

        }
  });


  function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'criteriaMeta'},
      success:function(result){
        console.log(result);
      }
  })
}


function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'criteriaMeta'},
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
              <li class="breadcrumb-item active">Assign Criteria</li>
            </ol>
          </div>

        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><a href="{{route('criteria.index')}}" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Criteria </a>
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
              
          </ol>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Assign Criteria</h1>
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
            
            <div class="col-md-12 card card-theme">
              <div class="card card-theme">
              <div class="card-header">
                <h3 class="card-title">Upload Criteria</h3>
                <div id="example1_wrapper">

                </div>
              </div>
             
              <form method="post" enctype="multipart/form-data"  class="form-horizontal"
               action="{{route('admin.criteria.meta.store')}}">
                @csrf

                <div class="card-body p-2 pt-4 row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control">

                     <label for="criteria">Criteria</label>
                      <select class="form-control" name="criteria" required>
                        <option value="">Select Criteria</option>ð
                        @foreach($criterias as $criteria)
                          <option value="{{$criteria->id}}">{{$criteria->title}}</option>
                        @endforeach
                      </select>
                  </div>
                  
                  <span class="text-danger">@error('criteria') {{$message}} @enderror</span>
               
                    <div class="col-sm-6 row">

                    <div class="col-sm-12">
                      <div class="select2-purple">
                       <label for="categories">Assign Category</label>
                        <select name="categories[]" class="select2" multiple="multiple" 
                        data-placeholder="Select a categories" data-dropdown-css-class="select2-purple"
                         style="width: 100%;">
                        
                        <option value="">Assign Category</option>
                          @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach

                        </select>
                      </div>
                  
                      <span class="text-danger">@error('category') {{$message}} @enderror</span>
                    </div>
                    
<!-- 
                    <div class="col-sm-12">
                      <div class="select2-purple">
                       <label for="products">Assign Products</label>
                        <select name="products[]" class="select2" multiple="multiple" 
                        data-placeholder="Select a product" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        
                        <option value="">Assign Product</option>
                          @foreach($products as $product)
                              <option value="{{$product->id}}">{{$product->name}}</option>
                          @endforeach

                        </select>
                      </div>
                  
                      <span class="text-danger">@error('product') {{$message}} @enderror</span>
                    </div>
                     -->
                    
                    <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                      checked
                        />
                        
                      <h5> <span class="badge badge-success">Active</span></h5></td>
                  </div>	
                  
                  </div> 
                  </td>
                  </div>	
                  
                  </div>

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-dark">
                  <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;&nbsp;  Save Criteria Meta</button>
                </div>
              </form>
            </div>

            
            <div class="col-md-12 card card-theme">
              <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Criteria List</h3>
              </div>
              
            <div class="card">
              <div class="card-body">
                <table id="example2 " class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50">Id</th>
                    <th>Criteria</th>
                    <th width="400">Categories</th>
                    <!-- <th width="400">Products</th> -->
                    <th width="100">Status</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody class="row_position">
                    @foreach($criteriaMetas as $key => $criteriaMeta)
                      <tr id="{{$criteriaMeta->id}}">
                      <td>{{++$key}}</td>
                      <td>
                      
                      {{checkIfCriteriaMetaDataAvailable($criteriaMeta->id, $criteriaMeta->categories, 'categories')}}
                      {{checkIfCriteriaMetaDataAvailable($criteriaMeta->id, $criteriaMeta->products, 'products')}}
                      
                      @if($criteriaMeta->criteria($criteriaMeta->criteria_id))
                        {{$criteriaMeta->criteria($criteriaMeta->criteria_id)->title}}
                      @endif
                      </td>

                        <td>
                          @if(isset($criteriaMeta->categories) && $criteriaMeta->categories != null)
                            @foreach($criteriaMeta->getCategories($criteriaMeta->categories) as $criteriaMetaCategory)
                                <h5 class="pull-left mr-2"><span class="badge badge-info">{{$criteriaMetaCategory}}</span></h5>
                            @endforeach

                          @endif

                        </td>
                        
                        <!-- <td>
                          @if(isset($criteriaMeta->products))
                            @foreach($criteriaMeta->getProducts($criteriaMeta->products) as $criteriaMetaProduct)
                                <h5 class="pull-left mr-2"><span class="badge badge-warning">{{$criteriaMetaProduct}}</span></h5>
                            @endforeach
                          @endif
                        </td> -->

                        <td>
                        
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="0"
                             id="exampleCheck1"

                              onClick="updateStatus({{$criteriaMeta->id}})"
                              @if($criteriaMeta->status == 1)checked
                              @endif 
                              @if(old('status'))checked
                              @endif
                              />
                              
                        @if($criteriaMeta->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                          </div>	
                          
                        <td>

                          <a href="{{route('admin.criteria.meta.edit',$criteriaMeta->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit Criteria"><i class="far fa-edit"></i></a>
                          <button class="btn btn-xs btn-danger del-modal float-left" 
                           title="Delete Criteria"  data-id="{{route('admin.criteria.meta.delete', $criteriaMeta->id)}}" 
                             data-title="{{getTableData('criterias',$criteriaMeta->criteria_id)->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                          </button>
                      
                      
                      </td>

                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="50">Id</th>
                    <th>Criteria</th>
                    <th width="300">Categories</th>
                    <!-- <th width="300">Products</th> -->
                    <th width="100">Status</th>
                    <th width="100">Action</th>
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