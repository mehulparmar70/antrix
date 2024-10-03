
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


<div class="cmsModal-row">
    

   
      <div class="container-fluid">

       
            
          
          
                <form  id="ajaxForm"  method="post" enctype="multipart/form-data" 
                class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <input type="hidden" name="type" value="home_page">             
                  <div class="cmsModal-row">
                    <div class="cmsModal-column">
                      
                      <div class="cmsModal-formGroup">
                        <label  class="cmsModal-formLabel" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="cmsModal-formControl" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$homeAbout->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                    </div>
                    <div class="cmsModal-column">
                      <div class="cmsModal-formGroup">
                          <label class="cmsModal-formLabel" for="search_index">Home Page Description</label>
                          <textarea class="cmsModal-formControl" id="editor" name="description" placeholder="Product Descriptions">
                          {{$homeAbout->description}}</textarea>
                      </div> 
                    </div> 
                   
                    <div class="form-group row col-sm-12">
                      <div  class="col-sm-6">
                        @include('widget.seo-content')

                        <label for="url">Page Url</label>
                        <input type="url" class="form-control" name="url" placeholder="Aboutus Page Url" value="{{$homeAbout->url}}">
                        <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
                      </div>
                      <div  class="col-sm-6">
                        @include('widget.seo-content-2')
                      </div>
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

