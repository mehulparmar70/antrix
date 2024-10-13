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




    <div class="col-md-5 ">
      <div>
        <h3 class="card-title">Add Award</h3>
      </div>


      <form method="post" id="ajaxForm" enctype="multipart/form-data" class="form-horizontal"
        action="{{route('award.store')}}">
        @csrf
        <input type="hidden" id="page_type" value="singleUpload">
        <div class="card-body p-2 pt-4">
          <div class="form-group row">
            <div class="col-sm-12">
              <div class="cmsModal-formGroup">
                <label for="name" class="cmsModal-formLabel">Award Name</label>
                <input class="cmsModal-formControl" type="text" name="name" placeholder="Award name">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
              </div>
             
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <div class="cmsModal-formGroup">
              <label for="note" class="cmsModal-formLabel">Award Note</label>
              <textarea class="cmsModal-formControl" type="text" name="note" placeholder="Alt Text / Award Note"></textarea>
              <span class="text-danger">@error('note') {{$message}} @enderror</span>
            </div>
          </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <div class="cmsModal-formGroup">
              <label for="image_alt" class="cmsModal-formLabel">Logo</label><br>
              <input type="file" name="image" class="file_input" id="image" required
                accept="image/png,image/jpeg,image/webp">
              <br>
              <p class="text-danger">Supportable Format: <br> JPG,JPEG,PNG,WEBP</p><br>
              <img class="perview-img favicon" height="120" src="{{asset('/')}}img/no-item.jpeg">
              <span class="text-danger">@error('image') {{$message}} @enderror</span>
            </div>
            </div>



            <div class="form-check mt-4">
              <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1" checked />

              <h5> <span class="badge badge-success">Active</span></h5>
            </div>


          </div>
        </div>
        <div class="card-footer text-right">
          @if(request()->get('onscreenCms') == 'true')
          <button type="submit" class="cmsBtn blue" name="close" value="1"><i class="fa fa-floppy-o"
              aria-hidden="true"></i>
            Save Award & Close</button>
          @else
          <button type="submit" class="cmsBtn blue"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save
            Award</button>
          @endif
        </div>
      </form>

    </div>

    <div class="col-md-7">
      <div>
        <h3 class="card-title">Award Lists</h3>
      </div>
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
                    onClick="updateStatus({{$client->id}})" @if($client->status == 1)checked
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
        <button class="btn btn-xs btn-danger del-modal float-left" title="Delete Award"
          data-id="{{route('admin.index')}}/award/{{ $client->id}}" data-title="{{ $client->name}}" data-toggle="modal"
          data-target="#modal-default"><i class="fa fa-trash"></i>
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