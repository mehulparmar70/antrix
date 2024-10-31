<script>
  $(document).ready(function () {
    $(".del-modal").click(function () {
      var delete_id = $(this).attr('data-id');
      var data_title = $(this).attr('data-title');

      $('.delete-form').attr('action', delete_id);
      $('.delete-title').html(data_title);
    });
  });

  $(".block-control").addClass("menu-is-opening menu-open");
  $(".block-control a").addClass("active-menu");


  function updateStatus($id) {
    $.ajax({
      url: "{{route('status.update')}}",
      type: 'post',
      data: { id: $id, table: 'awards' },
      success: function (result) {
        console.log(result);
        location.reload();

      }
    })
  }

  $(".row_position").sortable({
    stop: function () {
      var selectedData = new Array();
      $('.row_position>tr').each(function () {
        selectedData.push($(this).attr("id"));
      });
      updateOrder(selectedData);

      toastr.success('Award Order Updated...');
    }
  });

  function updateOrder(data) {
    $.ajax({
      url: "{{url('api')}}/admin/item/update-item-priority",
      type: 'post',
      data: { position: data, table: 'awards' },
      success: function (result) {
        console.log(result);
      }
    })
  }

</script>


<div class="card-body p-2">



  <div class="form-group row">




  <div class="col-sm-12">
        <ol class=" float-sm-right">
        <ol class=" float-sm-right"><button  onclick="popupmenu(`{{url('powerup/award/createaward')}}`,'editmodal','','','','')" class="cmsBtn blue"><i class="fa fa-plus" aria-hidden="true"></i>
                &nbsp;&nbsp;Add New Award </button>
            
        </ol>
      </div>

    <div class="col-md-12">
 
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" id="clienttable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Logo</th>
              <th>Note</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody class="row_position">
            @foreach($awards as $i => $client)
            <tr id="{{$client->id}}">
              <td>{{$client->item_no}}</td>

              <td>{{$client->name}}</td>
              @if($client->image)
              <td><img class="rounded" style="width:150px" src="{{asset('/')}}images/{{$client->image}}" width="120">
              </td>
              @else

              <td><img class="rounded" style="width:150px" src="{{asset('/')}}/img/no-user.jpeg" width="120"></td>
              @endif

              <td>{{$client->note}}</td>
              <td>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1"
                    onClick="updateStatus({{$client->id}},'award')" @if($client->status == 1)checked
                  @endif
                  @if(old('status'))checked
                  @endif
                  />

                  @if($client->status == 0)
                  <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span
                      class="badge badge-success">Active</span></h5>@endif
              </td>
      </div>

      </td>
      <td>
        @if(request()->get('onscreenCms') == 'true')

        <a href="javascript:void(0);" class="btn btn-xs btn-info float-left mr-2 btn-edit-award"
          data-id="{{ $client->id }}" data-url="{{ route('award.edit', $client->id) }}" title="Edit Award"
          data-type="editmodal"
          onclick="popupmenu('{{ route('award.edit', $client->id) }}', 'editmodal', 'left=200, width=990, height=860'); return false;">
          <i class="fa fa-edit"></i>
        </a>

        @else
        <a href="{{route('award.edit',$client->id)}}" class="btn btn-xs btn-info float-left mr-2" title="Edit award"><i
            class="fa fa-edit"></i></a>
        @endif

        <a href="{{route('award.delete', $client->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete slider" 
                            onclick="popupmenu('{{route('award.delete', $client->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
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