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
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">


      <div class="row">
   

        <div class="col-sm-6">
            <h3 class="mb-0">Testimonial Page Manage</h3>
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
                <form id="caseStudies" role="form" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
                  @csrf

                  <div class="card-body p-2">
                    <div class="form-group row">
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Add Custom Url</label>
                        <input type="text" class="form-control" name="page_url" 
                          placeholder="Custom Url" value="<?= $url_list[0]['url']?>">
                          <input type="hidden" class="form-control" name="page_name" 
                          placeholder="Custom Url" value="<?= $url_list[0]['name']?>">
                        <span class="text-danger"></span>
                      </div>
                      <input type="hidden" name="type" value="about_page">   
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$pageData->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      <div class="col-sm-12">
                          <textarea id="editor" name="description" placeholder="Testimonial Descriptions">
                          {{$pageData->description}}</textarea>
                          <span class="text-danger">@error('description') {{$message}} @enderror</span>
                        </div>
                    <input type="hidden" name="type" value="testimonial_page">               
                    </div>
                    <div class="form-group">
                       <!-- SEO Content Section -->
            <div class="col-md-6">
              <label>Add SEO Contents</label>
              <input type="text" class="form-control mb-2" name="seo_title" placeholder="SEO Title" value="{{ $pageData->meta_title }}">
              <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="SEO Keywords" value="{{ $pageData->meta_keyword }}">
              <textarea class="form-control mb-2" name="seo_description" placeholder="SEO Description" >{{ $pageData->meta_description }}</textarea>

              <!-- SEO Options -->
              <div class="row">
                  <div class="col-md-6">
                      <label for="allow_search_engines">Allow Search Engines?</label>
                      <select class="form-control" name="allow_search_engines">
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label for="follow_links">Follow Links?</label>
                      <select class="form-control" name="follow_links">
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                      </select>
                  </div>
              </div>

              <input type="text" class="form-control mt-2" name="canonical_url" placeholder="Canonical URL" value="{{ $pageData->canonical_url }}">
              <div class="form-check mt-2">
                  <input class="form-check-input" type="checkbox" name="active" value="1" id="active" checked>
                  <label class="form-check-label" for="active">
                      Active
                  </label>
              </div>
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


      </div>
    </section>
  </div>