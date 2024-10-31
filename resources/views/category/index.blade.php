<!-- DataTables  & Plugins -->
<!-- <script src="{{url('adm')}}/plugins/datatables/jquery.dataTables.min.js"></script>
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
<script src="{{url('adm')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->


<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script> -->

<script>

  $(document).ready(function () {

    $("#subCategoryCheckAll").click(function (e) {
      // $(".checkList").attr('checked', true);

      // console.log($('.checkList'))
      $('.checkList').each(function () { this.checked = !this.checked; });
    });


    $(".del-modal").click(function () {
      var delete_id = $(this).attr('data-id');
      var data_title = $(this).attr('data-title');

      // $('.delete-form').attr('action','/admin/category/'+ delete_id);
      $('.del-link').attr('href', delete_id);

      $('.delete-title').html(data_title);
    });
  });

  function updateStatus($id) {
    $.ajax({
      url: "{{route('status.update')}}",
      type: 'post',
      data: { id: $id, table: 'category' },
      success: function (result) {
        console.log(result);
        location.reload();

      }
    })
  }

  $(".listing").addClass("menu-is-opening menu-open");
  $(".listing a").addClass("active-menu");



  $(function () {
    if ($("#example1").length > 0) {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }

  });

  //   $(function () {
  //     $("#example2").DataTable({
  //       "responsive": true, "lengthChange": false,
  //     }).buttons().container().appendTo('#example2_wrapper .col-md-12:eq(0)');

  //   });

  $(".row_position").sortable({
    stop: function () {
      var selectedData = new Array();
      $('.row_position>tr').each(function () {
        selectedData.push($(this).attr("id"));
      });
      updateOrder(selectedData);
      toastr.success('Category Order Updated...')
    }
  });

  function updateOrder(data) {
    $.ajax({
      url: "{{url('api')}}/admin/item/update-item-priority",
      type: 'post',
      data: { position: data, table: 'categories' },
      success: function (result) {
        console.log(result);
      }
    })
  }
</script>


<?php

  if(isset($_GET['type']) && $_GET['type'] == 'main_category'){
    $pageSlug = $_GET['type'];
    $pageType = "Main Category";
  }
  elseif(isset($_GET['type']) && $_GET['type'] == 'sub_category'){
    $pageSlug = $_GET['type'];
    $pageType = "Sub Category";
  }else{
    $pageSlug = 'main_category';
    $pageType = "Main Category";

  }


?>


<div class="content-wrapper">

    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-6">

        <ol class=" float-sm-right">
            <button onclick="popupmenu(`{{route('admin.category.create')}}?type=main_category`,'editmodal','','','','')"
              class="cmsBtn blue"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp;&nbsp;Add Main Category </button>
          </ol>

        </div>

        <div class="col-sm-6">

 
          <ol class=" float-sm-right">
            <button onclick="popupmenu(`{{route('admin.category.create')}}?type=sub_category`,'editmodal','','','','')"
              class="cmsBtn blue"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp;&nbsp;Add Sub Category </button>
          </ol>
     
        </div>

        <div class="mb-2">
          <div class="col-sm-12">
            <h3 class="mb-0">{{$pageType}}</h3>
          </div>
        </div>
      </div>
    </div>


  @if($pageSlug == 'main_category' || $pageSlug == null )
 
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="">

            <div class=" p-0">

              <input type="hidden" name="type" value="main_category">

              <table id="clienttable" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    
                    <th>Image</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="row_position">

                  @foreach($categories as $i => $parent_category)


           
                  <tr id="{{$parent_category->id}}">
                

                    @if(isset($parent_category->image))
                    <td><img class="rounded img-block" width="200"
                        src="{{asset('/')}}images/{{$parent_category->image}}" /></td>
                    @else

                    <td><img class="rounded" width="100" src="{{asset('/')}}img/no-item.jpeg"></td>
                    @endif

                    <td>{{$parent_category->name}}</td>

                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1"
                          onClick="updateStatus({{$parent_category->id}},'category')" @if($parent_category->status == 1)checked
                        @endif
                        @if(old('status'))checked
                        @endif
                        />

                        @if($parent_category->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span
                            class="badge badge-success">Active</span></h5>@endif
                            </div> 
                          </td>
            
         
            <td width="150">

              <div class="row">

           




                <!-- <a class="btn btn-xs btn-dark" 
                          href="{{route('admin.category.edit',$parent_category->id)}}?type=main_category"><i class="fa fa-edit"></i></a> -->
                <a href="javascript:void(0);" class="btn btn-sm btn-dark float-left mr-2" title="Edit Main Category"
                  onclick="popupmenu('{{url('powerup/category/edit',$parent_category->id)}}', 'editmodal');">
                  <i class="fa fa-edit"></i>
                </a>
                &nbsp;&nbsp;&nbsp;

                <a href="{{route('admin.category.delete', $parent_category->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete slider" 
                            onclick="popupmenu('{{route('admin.category.delete', $parent_category->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
                            <i class="fa fa-trash"></i>
                          </a>
             
              </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <!-- </form> -->

          </div>
        </div>
      </div>
    </div>





@elseif($pageSlug == 'sub_category')

  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="">

          <div class=" p-0">

            <input type="hidden" name="type" value="main_category">

            <table id="clienttable" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <th width="50">Order</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="row_position">

                @foreach($categories as $i => $parent_category)


                <tr id="{{$parent_category->id}}">
                  <td>{{$parent_category->item_no}}</td>

                  @if(isset(getImageFromCategory($parent_category->id)[0]->image))
                  <td><img class="rounded img-block" width="200"
                      src="{{asset('/')}}/images/{{getImageFromCategory($parent_category->id)[0]->image}}" /></td>
                  @else

                  <td><img class="rounded" width="100" src="{{asset('/')}}img/no-item.jpeg"></td>
                  @endif

                  <td>{{$parent_category->name}}</td>

                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1"
                        onClick="updateStatus({{$parent_category->id}},'category')" @if($parent_category->status == 1)checked
                      @endif
                      @if(old('status'))checked
                      @endif
                      />

                      @if($parent_category->status == 0)
                      <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span
                          class="badge badge-success">Active</span></h5>@endif
                  </td>
          </div>
          </td>
          <td width="150">

            <div class="row">


              <!-- <a class="btn btn-xs btn-dark" 
                        href="{{route('admin.category.edit',$parent_category->id)}}?type=main_category"><i class="fa fa-edit"></i></a> -->
              <a href="javascript:void(0);" class="btn btn-sm btn-dark float-left mr-2" title="Edit Main Category"
                onclick="popupmenu('{{url('powerup/category/edit',$parent_category->id)}}', 'editmodal');">
                <i class="fa fa-edit"></i>
              </a>
              &nbsp;&nbsp;&nbsp;


              <button type="button" class="btn btn-xs btn-danger del-modal" title="Delete Category"
                data-id="{{route('admin.index')}}/category/delete/{{ $parent_category->id}}"
                data-title="{{ $parent_category->name}}" data-toggle="modal" data-target="#modal-default"><i
                  class="fa fa-trash"></i>
              </button>
            </div>
          </td>
          </tr>
          @endforeach
          </tbody>
          </table>
          <!-- </form> -->

        </div>
      </div>
    </div>
  </div>




@else


  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header  bg-dark">
            <h3 class="card-title"><i class="fa fa-th-list nav-icon"></i>&nbsp;&nbsp;
              {{$pageType}}


            </h3>

          </div>

          <div class="card-body table-responsive p-0">
            <form action="{{route('item.bulk-delete')}}" method="post">
              @csrf
              <input type="hidden" name="type" value="main_category">
              <table id="example2" class="table table-bordered">
                <thead>
                  <tr>

                    <th width="50">Order</th>
                    <th>
                      <input type="checkbox" class="checkAll" name="status" id="checkAll" />

                    </th>
                    <th>Image</th>
                    <th>Main Category</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                  </tr>
                </thead>

                <tbody class="row_position">

                  @foreach($parent_categories as $i => $parent_category)


                  <tr>
                    <td>
                      <input type="checkbox" class="checkList" name="checkList[]" id="checkList"
                        value="{{$parent_category->id}}" />

                    </td>
                    <td>{{++$i}}</td>
                    @if(isset($parent_category->image))
                    <td><img class="rounded img-block" width="200"
                        src="{{asset('/')}}/images/{{$parent_category->image}}" /></td>
                    @else

                    <td><img class="img-circle elevation-2" height="30" width="30"
                        src="{{asset('/')}}img/no-item.jpeg"></td>
                    @endif

                    <td>{{$parent_category->name}}</td>

                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1"
                          onClick="updateStatus({{$parent_category->id}},'category')" @if($parent_category->status == 1)checked
                        @endif
                        @if(old('status'))checked
                        @endif
                        />

                        @if($parent_category->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span
                            class="badge badge-success">Active</span></h5>@endif
                    </td>
          </div>
          </td>

          <th width="50">Order</th>

          <th class="">
            <div class="row">



              <a target="_blank" href="{{url('')}}/{{$finalSlug}}{{$product->slug}}"
                class="btn btn-xs btn-warning float-left mr-2">
                <i class="fa fa-eye"></i></a>

              <!-- <a class="btn btn-xs btn-dark"
                           href="{{route('admin.category.edit',$parent_category->id)}}"><i class="fa fa-edit"></i></a> -->
              <a href="javascript:void(0);" class="btn btn-sm btn-dark float-left mr-2" title="Edit Main Category"
                onclick="popupmenu('{{url('category/edit',$parent_category->id)}}', 'editmodal');">
                <i class="fa fa-edit"></i>
              </a>
              &nbsp;&nbsp;&nbsp;


              <button type="button" class="btn btn-xs btn-danger del-modal" title="Delete Category"
                data-id="{{route('admin.index')}}/category/delete/{{ $parent_category->id}}"
                data-title="{{ $parent_category->name}}" data-toggle="modal" data-target="#modal-default"><i
                  class="fa fa-trash"></i>
              </button>
            </div>
          </th>
          </tr>
          @endforeach
          </tbody>

          @if($parent_categories->count() > 0)
          <tfooter>
            <tr>
              <td>

                <input type="checkbox" class="checkAll" name="status" id="checkAll" />
              </td>
              <td colspan="5">

                <button type="submit" name="action" value="active" class="btn btn-primary btn-sm"><i class="fa fa-check"
                    aria-hidden="true"></i>&nbsp;&nbsp;
                  Active</button>

                <button type="submit" name="action" value="deactive" class="btn btn-info btn-sm"><i class="fa fa-times"
                    aria-hidden="true"></i>&nbsp;&nbsp;Deactive</button>

                <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                    aria-hidden="true"></i>&nbsp;&nbsp;Delete</button>


              </td>
            </tr>
          </tfooter>
          @endif

          </table>
          </form>

        </div>
      </div>
    </div>
  </div>




@endif


</div>