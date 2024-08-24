<form  id="ajaxForm" method="post" enctype="multipart/form-data"  class="form-horizontal"
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <div class="card-body p-2">

                    <div class="form-group row">
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Add Custom Url</label>
                        <input type="text" class="form-control" name="page_title" 
                          placeholder="Custom Url" value="<?= $url_list[0]['url']?>">
                        <span class="text-danger"></span>
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