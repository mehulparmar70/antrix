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
                                      <div class="col-sm-8 mt-4">
                                        <label  class="" for="meta_description">Page Short Description</label>
                                        <textarea type="text" class="form-control" name="page_title" 
                                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$pageData->page_title}}@endif</textarea>
                                        <span class="text-danger"></span>
                                      </div>
                                      <div class="col-sm-12">
                                        <label for="description">Casestudies Description</label>
                                          <textarea id="editor" name="description" placeholder="Casestudies Descriptions">
                                          {{$pageData->description}}</textarea>
                                          <span class="text-danger">@error('description') {{$message}} @enderror</span>
                                        </div>
                                      
                                    <input type="hidden" name="type" value="casestudies_page">               
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-12 row">
                                        <div  class="col-sm-6">
                                          <span class="text-danger">@error('about_url') {{$message}} @enderror</span>
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