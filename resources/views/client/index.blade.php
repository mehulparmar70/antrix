

<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    
    $('.delete-form').attr('action', delete_id);
    $('.delete-title').html(data_title);
  });  
});

$(".block-control").addClass( "menu-is-opening menu-open");
$(".block-control a").addClass( "active-menu");


function updateStatus($id) {
  $.ajax({
      url:"{{route('status.update')}}",
      type:'post',
      data:{id:$id, table: 'client'},
      success:function(result){
        console.log(result);
        location.reload();

      }
  })
}

$( ".row_position" ).sortable({
      stop: function() {
			var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);

            toastr.success('Client Order Updated...')
        }
  });

function updateOrder(data) {
  $.ajax({
      url:"{{url('api')}}/admin/item/update-item-priority",
      type:'post',
      data:{position:data, table: 'client'},
      success:function(result){
        console.log(result);
      }
  })
}

</script>



<div class="card-body p-2">
    


    <div class="form-group row">
      
     

          <div class="col-md-5 ">
              <div>
                      <h3 class="card-title">Add Client</h3>
                </div>
                

                <form method="post"  id="ajaxForm" enctype="multipart/form-data"  class="form-horizontal" action="{{route('client.store')}}">
                  @csrf

                  <div class="card-body p-2 pt-4">
                  <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="name">Client Name</label>
                          <input class="form-control"  type="text" name="name" placeholder="Client name">
                          <span class="text-danger">@error('name') {{$message}} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="note">Client Note</label>
                          <textarea class="form-control" type="text" name="note" placeholder="Alt Text / Client Note"></textarea>
                          <span class="text-danger">@error('note') {{$message}} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                        <input type="hidden" id="page_type" value="singleUploadMultipleInput">
                        <div class="col-sm-12">
                        <label for="image_alt">Logo</label><br>
                        <input type="file" name="image" class="file_input " id="image" required
                          accept="image/png,image/jpeg,image/webp">
                          <br>
                        <p class="text-danger">Supportable Format:  <br> JPG,JPEG,PNG,WEBP</p><br>
                        <img class="perview-img image"  height="120" src="{{asset('/')}}img/no-item.jpeg"> 
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                      </div>



                  <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input  pull-right" name="status" 
                        id="exampleCheck1"
                      checked
                        />
                        
                      <h5> <span class="badge badge-success">Active</span></h5>
                      </div>
  

                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="name">Url</label>
                          <input class="form-control"  type="text" name="url" placeholder="Url">
                          <span class="text-danger">@error('url') {{$message}} @enderror</span>
                      </div>
                      <div class="col-sm-12">
                        <label for="image_alt">Image</label><br>
                        <input type="file" name="client_images" class="file_input " id="image" required
                          accept="image/png,image/jpeg,image/webp">
                          <br>
                        <p class="text-danger">Supportable Format:  <br> JPG,JPEG,PNG,WEBP<br> </p>
                        <img class="perview-img client_images"  height="120" src="{{asset('/')}}img/no-item.jpeg"> 
                        <span class="text-danger">@error('client_images') {{$message}} @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    @if(request()->get('onscreenCms') == 'true')
                      <button type="submit" class="btn btn-info btn-save" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save Client & Close</button>
                    @else
                      <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Client</button>
                    @endif
                  </div>
                </form>

              </div>
           
           <div class="col-md-7 ">
              <div >
                      <h3 class="card-title">Client Lists</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table data-table="clients" class="table table-hover text-nowrap" id="clienttable">
                    <thead>
                      <tr>
                 
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                  <tbody class="row_position">
                      @foreach($clients as $i => $client)
                      <tr id="{{$client->id}}"> 
            

                          <td>{{$client->name}}</td>
                          @if($client->image)
                          <td><img class="rounded" style="width:150px"
                              src="{{asset('/')}}images/{{$client->image}}" width="120"></td>
                              @else
                              
                          <td><img class="rounded" style="width:150px"
                              src="{{asset('/')}}/img/no-user.jpeg" width="120"></td>
                          @endif

                          <td>{{$client->note}}</td>
                          <td>
                          
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input  pull-right" name="status" 
                                id="exampleCheck1"
                                
                                  onClick="updateStatus({{$client->id}})"
                                  @if($client->status == 1)checked
                                  @endif 
                                  @if(old('status'))checked
                                  @endif
                                  />
                                  
                                @if($client->status == 0)
                                <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
                            </div>	
                            
                          </td>
                          <td>
                            <a href="javascript:void(0);" 
                            class="btn btn-xs btn-info float-left mr-2 btn-edit-client" 
                            data-id="{{ $client->id }}" 
                            data-url="{{ route('client.edit', $client->id) }}" 
                            title="Edit client" 
                            data-type="editmodal" 
                            onclick="popupmenu('{{ route('client.edit', $client->id) }}', 'editmodal', 'left=200, width=990, height=860'); return false;">
                            <i class="fa fa-edit"></i>
                         </a>
                         
                            <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete client" 
                             data-id="{{route('admin.index')}}/client/{{ $client->id}}" data-title="{{ $client->name}}" 
                              data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash"></i>
                            </button>                      
                        </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                  
                </div>
          
           
           
      
    </div>
  
  


    </div>

  