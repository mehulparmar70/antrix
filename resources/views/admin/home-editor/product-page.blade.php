

@include('widget.table-search-draggable')

<div class="content-wrapper">
    


      <div class="container-fluid">
        <div class="">
          <div class="">
            <div class="form-horizontal row">
            <div class="col-md-12">
              <div class="">
             
                <form id="ajaxForm"  method="post" enctype="multipart/form-data"  class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <div class="card-body p-2">
                    <div class="form-group row">
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$pageData->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      <div class="col-sm-12">
                      <textarea id="editor" name="description" placeholder="Product Descriptions">
                          {{$pageData->description}}
                      </textarea>
                          <span class="text-danger">@error('description') {{$message}} @enderror</span>

                        <input type="hidden" name="type" value="product_page">  
                      </div>
                    </div>
                    <div class="form-group row">
                      <div  class="col-sm-6">
                        @include('widget.seo-content')
                        <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                      </div>
                      <div  class="col-sm-6">
                        @include('widget.seo-content-2')
                      </div>
                    </div>

                  <div class="card-footer text-center">
                    @if(request()->get('onscreenCms') == 'true')
                      <button type="submit" class="btn btn-info btn-save" name="close" value="1"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Save & Close</button>
                    @else
                      <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Save Data</button>
                    @endif
                  
                  </div>
                </form>
            </div>

        </div>


      </div>
  
  </div>


 