<div class="col-md-4 card card-theme">
  <div class="card card-theme">
    <div class="card-header">
      <h3 class="card-title">Edit Slider</h3>
      <div id="example1_wrapper">

      </div>
    </div>
    <form id="ajaxForm" method="post" enctype="multipart/form-data" class="form-horizontal" action="{{ route('slider.update') }}">
        @csrf
        <input type="hidden" id="page_type" value="singleUpload">
        <!-- <div class="card-body p-2 pt-4"> -->
          <div class="form-group row">
              <div class="col-md-12">
                  <input type="text" class="form-control" name="title"
                            placeholder="Slider Title" 
                            value="<?= $sliders->title;?>">
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <textarea id="editor" class="ckeditor form-control" name="description"
                  placeholder="Slider Alt Text / Description">@if(old('description')){{old('description')}}@else{{$sliders->description}}@endif</textarea>

              <span class="text-danger">@error('description') {{$message}} @enderror</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <input type="url" class="form-control" name="url"
                  placeholder="Slider Url"
                  value="@if(old('url')){{old('url')}}@else{{$sliders->url}}@endif">

              <span class="text-danger">@error('url') {{$message}} @enderror</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <input type="file" class="file_input" 
                name="image" placeholder="Slider Image"
                  accept="image/png,image/jpeg,image/webp" />
              <span class="text-danger">@error('image') {{$message}} @enderror</span>
                <p class="text-danger">
                  Image size for should be( 1351Px   X   700Px ).<br>
                  Supportable Format: JPG,JPEG,PNG,WEBP
                </p>
                  @if($sliders->image)
                    <img class="mt-2 perview-img"  height="120"
                      src="{{asset('web')}}/media/xs/{{$sliders->image}}">
                      @else
                      <img class="perview-img"  height="120"
                    src="{{asset('adm')}}/img/no-item.jpeg">
                  @endif
                <input type="hidden" name="old_image" value="{{$sliders->image}}">
            </div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input  pull-right" name="status" 
            id="exampleCheck1"
              @if($sliders->status == 1)checked
              @endif 
              @if(old('status'))checked
              @endif
              />
              
            @if($sliders->status == 0)
            <h5> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
          </div>
        <!-- </div> -->
        <div class="card-footer">
          @if(request()->get('onscreenCms') == 'true')
            <button type="submit" class="btn btn-info btn-save" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
            Save Slider & Close</button>
            <a href="{{route('slider.index')}}?onscreenCms=true" class="btn btn-info btn-save mt-2"><i class="fa fa-floppy-o" aria-hidden="true"></i>
            &nbsp;&nbsp;Add New Sliders </a>
          @else
            <button type="submit" class="btn btn-dark">Save Slider</button>
          @endif
        </div>
    </form>
  </div>
  <div class="col-md-8 card card-theme">
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">Slider List</h3>
      </div>
      <div class="card">
        <div class="card-body">
          <table id="example2 " class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Descriptions</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>

            <tbody class="row_position">
              @foreach($slider as $key => $slider)
                <tr id="{{$slider->id}}">
                <td>{{$slider->slider_no}}</td>
                  <td><img width="100" src="{{url('web')}}/media/sm/{{$slider->image}}"></td>
                  <td>{{$slider->title}}</td>
                  <td>{{$slider->description}}</td>
                  <td>
                  
                  
              <div class="form-check">
                  <input type="checkbox" class="form-check-input  pull-right" name="status" 
                  id="exampleCheck1"
                  
                    onClick="updateStatus({{$slider->id}})"
                    @if($sliders->status == 1)checked
                    @endif 
                    @if(old('status'))checked
                    @endif
                    />
                    
                  @if($slider->status == 0)
                  <h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>@else<h5> <span class="badge badge-success">Active</span></h5>@endif</td>
              </div>	
                  
                  </td>
                  
                  <td>
                  
                    <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Edit slider"><i class="far fa-edit"></i></a>
                    {{-- <a href="{{route('slider-image.edit',$slider->id)}}" class="btn btn-xs btn-info float-left mr-2"  title="Upload slider Images"><i class="far fa-edit"></i></a> --}}
                    <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete slider"  data-id="{{route('admin.index')}}/slider/{{$slider->id}}" 
                      data-image="{{url('web')}}/media/sm/{{ $slider->image}}" data-title="{{ $slider->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                    </button>
                
                
                </td>

                </tr>
              @endforeach

            </tbody>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Descriptions</th>
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Slider</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Slider Name</label>
        <h5 class="modal-title delete-title">Delete Slider</h5>
        <img  class="col-md-8 modal-title delete-data-image" src="">
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

<script>
    CKEDITOR.replace('editor');
</script>
