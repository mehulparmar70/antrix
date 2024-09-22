
<style>

.youtube_embed1 > iframe{
    max-width: 200px !important;
    width: 200px !important;
    height: auto !important;
}

</style>

<!-- DataTables  & Plugins -->
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
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
  });  
});


$(".video").addClass( "menu-is-opening menu-open");
$(".video a").addClass( "active-menu");


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
      data:{position:data, table: 'video'},
      success:function(result){
            toastr.success('Video Order Updated...')
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'video'},
      success:function(result){
        // console.log(result);
        location.reload();

      }
  })
}
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
          <ol class="breadcrumb float-sm-right">
          <ol class="breadcrumb float-sm-right"><button onclick="popupmenu(`{{route('video.create')}}?type=main_category`,'editmodal','','','','')" class="btn btn-success btn-sm ml-2"><i class="fa fa-plus" aria-hidden="true"></i>
                  &nbsp;&nbsp;Add New Video </button>
              
              
          </ol>
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
                <table data-table="videos" id="example1" class="table table-bordered table-striped" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Youtube Video</th>
                      <th width="250">Title</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th width="140">Action</th>
                    </tr>
                  </thead>
                  <tbody class="row_position">
                    @foreach($videos as $i => $video)
                      <tr id="{{$video->id}}"> 
                        <td>{{$video->item_no}}</td>
                       

                        <td class="youtube_embed1">{!! html_entity_decode($video->youtube_embed) !!}</td>
                        <td>{{$video->title}}</td>
                        <td  class="width-150">{{$video->video_date}}</td>
                        
							
                        <td>
                        
                      
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          onClick="updateStatus({{$video->id}})"
                          @if($video->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($video->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	
                    </td>
                        
                        <td>
                        <a href="javascript:void(0);" 
                            class="btn btn-xs btn-info float-left mr-2 btn-edit-award" 
                            data-id="{{ $video->id }}" 
                            data-url="{{ route('video.edit', $video->id) }}" 
                            title="Edit Video" 
                            data-type="editmodal" 
                            onclick="popupmenu('{{ route('video.edit', $video->id) }}', 'editmodal', 'left=200, width=990, height=860'); return false;">
                            <i class="fa fa-edit"></i>
                         </a>
                            
                      
                          
             <a href="{{route('video.delete', $video->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete video" 
                            onclick="popupmenu('{{route('video.delete', $video->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
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
  
 