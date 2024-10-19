

@include('widget.table-search-draggable')

<div class="content-wrapper">



  <div class="container-fluid">

    <div class="">
      <div class="card-body">
        <div class="form-horizontal row">

            
            <div class="col-md-8 ">
              <div class="">
              <div class="card-header">
                <h3 class="card-title">Slider List</h3>
              </div>
              
            <div >
              <div >
                <table data-table="slider" id="clienttable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

              <div>
                <div>
                  <table id="clienttable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody class="row_position">
                      @foreach($sliders as $key => $slider)
                      <tr id="{{$slider->id}}">
                        <td>{{$slider->slider_no}}</td>
                        <td><img width="100" src="{{url('/')}}/images/{{$slider->image}}"></td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->description}}</td>
                        <td>

                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="0" id="exampleCheck1"
                              onClick="updateStatus({{$slider->id}})" @if($slider->status == 1)checked
                            @endif
                            @if(old('status'))checked
                            @endif
                            />

                            @if($slider->status == 0)<p class="badge badge-danger">Inactive</p>@else<p
                              class="badge badge-success">Active</p>@endif
                        </td>

                        <td>
                        <a href="{{route('slider.edit', $slider->id)}}" 
                            class="btn btn-xs btn-info float-left mr-2"  
                            title="Edit slider" 
                            onclick="popupmenu('{{route('slider.edit', $slider->id)}}', 'editmodal', 'left=100,width=800,height=600'); return false;">
                            <i class="fa fa-edit"></i>
                          </a>
                        <a href="{{route('slider.delete', $slider->id)}}" 
                            class="btn btn-xs btn-danger float-left mr-2"  
                            title="Delete slider" 
                            onclick="popupmenu('{{route('slider.delete', $slider->id)}}', 'deletemodal', 'left=100,width=800,height=600'); return false;">
                            <i class="fa fa-trash"></i>
                          </a>

                        
                      
                      
                      </td>



                </td>

                </tr>
                @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                </table>

              </div>
            </div>

          </div>


        </div>

      </div>


    </div>

  </div>