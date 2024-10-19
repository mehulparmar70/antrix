
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


<script src="{{url('/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{url('/')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('/')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
      data:{position:data, table: 'partners'},
      success:function(result){
        toastr.success('Blog Order Updated...')
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'partners'},
      success:function(result){
        location.reload();
      }
  })
}

$(".partners").addClass( "menu-is-opening menu-open");
$(".partners a").addClass( "active-menu");

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
</script>

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">


      <div class="row">
      
   

        
        <div class="col-sm-12">
          <ol class=" float-sm-right">
          <ol class=" float-sm-right"><button onclick="popupmenu(`{{route('partners.create')}}`,'editmodal','','','','')" class="cmsBtn blue"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Partner </button>
        
          </ol>
        </div>
        
    </div>


      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div>


              <div class=" table-responsive p-0">
                <table data-table="partners" id="clienttable" class="table table-bordered table-striped" >
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
                          src="{{asset('/')}}images/{{$blog->image}}"></td>
                          @else

                        <td><img class="rounded"    width="100"
                          src="{{asset('/')}}img/no-item.jpeg"></td>
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
                        
                        
                         
                          <a target="_blank" href="{{url('partners')}}/{{$blog->slug}}" class="btn btn-sm btn-warning float-left mr-2"  title="View Partners"><i class="fa fa-eye"></i></a>
                          <a href="javascript:void(0);" 
                            class="btn btn-xs btn-info float-left mr-2 btn-edit-client" 
                            data-id="{{ $blog->id }}" 
                            data-url="{{ route('partners.edit', $blog->id) }}" 
                            title="Edit Partners" 
                            data-type="editmodal" 
                            onclick="popupmenu('{{ route('partners.edit', $blog->id) }}', 'editmodal', 'left=200, width=990, height=860'); return false;">
                            <i class="fa fa-edit"></i>
                         </a>
                          
             <a href="{{route('partners.delete', $blog->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete partners" 
                            onclick="popupmenu('{{route('partners.delete', $blog->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
                            <i class="fa fa-trash"></i>
                          </a>
                      
                      
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
  
 