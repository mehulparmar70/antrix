<!-- 
@section('title','About Page Editor')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
<script>
$( document ).ready(function() {
  $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    var data_url = $(this).attr('data-url');
    
    $('.delete-form').attr('action','/admin/url-list1/delete/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-url').attr('src',data_url);
  });  
});


$(".page").addClass( "menu-is-opening menu-open");
$(".page a").addClass( "active-menu");

</script>
@endsection

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">


    <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">About Page </li>
            </ol>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="col-sm-6">
            <h2>About Page </h2>
          </div>
    </div>
    

      
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="">
            <div class="form-horizontal row">
            
            <div class="col-md-12 card card-theme">
              <div class="card card-theme">
                <form  id="ajaxForm" method="post" enctype="multipart/form-data"  class="form-horizontal"
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
                        <textarea id="editor" name="description" placeholder="About Descriptions">{{$pageData->description}}</textarea>
                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12 row">
                        <div  class="col-sm-6">
                          @include('adm.widget.seo-content')
                          <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                        </div>
                        <div  class="col-sm-6">
                          @include('adm.widget.seo-content-2')
                        </div>
                      </div>
                    </div>

                      
                  </div>
                    <input type="hidden" name="type" value="about_page">      
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
    </section>
  </div>

  @endsection -->


  <div id="ajaxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBodyContent">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
