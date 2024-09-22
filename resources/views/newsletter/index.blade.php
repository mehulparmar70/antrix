
<style>

.youtube_embed1 > iframe{
    max-width: 200px !important;
    width: 178px !important;
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

$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            updateOrder(selectedData);

           toastr.success('Testimonial Order Updated...')
        }
  });
  
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
  });  
});


$(".newsletter").addClass( "menu-is-opening menu-open");
$(".newsletter a").addClass( "active-menu");

  function updateOrder(data) {
  $.ajax({
      url:"{{url('/')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'newsletter'},
      success:function(result){
        // console.log(result);
      }
  })
}

function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'newsletter'},
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
    
<button class="btn btn-dark" onclick="addnewsletter()">
    <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Add
</button>
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body  p-0">                
                <table data-table="newsletters" id="example1" class="table table-bordered table-striped" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th style="min-width: 50% !important;">Description</th>
                      <th>Status</th>
                      <th width="100">Action</th>
                    </tr>
                  </thead>

                  <tbody class="row_position">
                    @foreach($testimonials as $i => $testimonial)
                      <tr id="{{$testimonial->id}}"> 
                        <td>{{$testimonial->item_no}}</td>
                        

                        @if(isset($testimonial->image))
                          <td><img class="rounded"  width="150"
                            src="{{asset('/')}}images/{{$testimonial->image}}"></td>
                        @else

                          <td><img class="rounded"  width="150"
                          src="{{asset('/')}}img/no-item.jpeg"></td>
                        @endif

                        <td>{{$testimonial->title}}</td>
                        <td>{{$testimonial->short_description}}</td>
                        
							
                        <td>
                         
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                        
                          onClick="updateStatus({{$testimonial->id}})"
                          @if($testimonial->status == 1)checked
                          @endif 
                          @if(old('status'))checked
                          @endif
                          />
                          
                        @if($testimonial->status == 0)
                        <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                    </div>	
                        </td>
                        <td width="150">
                        <a href="javascript:void(0);" 
                            class="btn btn-xs btn-info float-left mr-2 btn-edit-client" 
                            data-id="{{ $testimonial->id }}" 
                            data-url="{{ route('newsletter.edit', $testimonial->id) }}" 
                            title="Edit Newsletter" 
                            data-type="editmodal" 
                            onclick="popupmenu('{{ route('newsletter.edit', $testimonial->id) }}', 'editmodal', 'left=200, width=990, height=860'); return false;">
                            <i class="fa fa-edit"></i>
                         </a>
                          

                           
             <a href="{{route('newsletter.delete', $testimonial->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete newsletter" 
                            onclick="popupmenu('{{route('newsletter.delete', $testimonial->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
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
   
  </div>

    



  