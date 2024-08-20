<div class="col-sm-12">
    
                    <!-- <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5> -->
                    <label class="text-dark" for="search_index">SEO CONTENTS</label>
                    <div class="col-sm-12">
                      <label  class="" class="" for="meta_title">SEO Title</label>
                      <input type="text" class="form-control" name="meta_title" 
                        placeholder="Seo Friendly Title" value="@if(old('meta_title')){{old('meta_title')}}@else{{$pageData->meta_title}}@endif">
                      <span class="text-danger"></span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," 
                        value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$pageData->meta_keyword}}@endif">
                      
                      <span class="text-danger"></span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">@if(old('meta_description')){{old('meta_description')}}@else{{$pageData->meta_description}}@endif</textarea>
                      <span class="text-danger"></span>
                    </div>
                    
                    <div class="col-sm-12 row mt-4">
                      <div class="col-sm-6">
                        <label  class="" class="" for="search_index">Allow search engines to show this Page in search results?</label>
                        <select class="form-control" name="search_index">
                            <option value="1"
                              @if($pageData->search_index == 1)
                                  selected
                              @endif
                            >Yes</option>
                            <option value="0"
                            
                            
                              @if($pageData->search_index == 0)
                                  selected
                              @endif
                            >No</option>
                        </select>
                      </div>
                      
                      <div class="col-sm-6 col-md-4">
                        <label  class="" class="" for="search_follow">Follow links on this Page?</label>
                        <select class="form-control mt-4" name="search_follow">
                            <option value="1"

                              @if($pageData->search_follow == 1)
                                    selected
                                @endif
                            >Yes</option>
                            <option value="0"
                            
                              @if($pageData->search_follow == 0)
                                  selected
                              @endif                            
                            >No</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-12 mt-2">
                      <label  class="" for="canonical_url">Canonical URL</label>
                      <input type="text" class="form-control" name="canonical_url" 
                        placeholder="Canonical URL" 
                        value="@if(old('canonical_url')){{old('canonical_url')}}@else{{$pageData->canonical_url}}@endif">
                      <span class="text-danger"></span>
                    </div>

                  </div>
