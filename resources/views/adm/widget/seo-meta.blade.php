
                  <div class="form-group row">
                    <h5 class="bg-dark pl-4 pr-4">SEO CONTENTS</h5>
                    
                    <div class="col-sm-12">
                      <label  class="text-danger" class="text-danger" for="meta_title">Allow search engines to show this Page in search results?</label>
                    <select class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    </div>

                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_keyword">Keyword</label>
                      <input type="text" class="form-control" name="meta_keyword" 
                        placeholder="Seo Keywords with ," 
                        value="@if(old('meta_keyword')){{old('meta_keyword')}}@else{{$pageData->meta_keyword}}@endif">
                      
                      <span class="text-danger"></span>
                    </div>
                    <div class="col-sm-12">
                      <label  class="text-danger" for="meta_description">Description</label>
                      <textarea type="text" class="form-control" name="meta_description" 
                        placeholder="Seo Friendly Title">@if(old('meta_description')){{old('meta_description')}}@else{{$pageData->meta_description}}@endif</textarea>
                      <span class="text-danger"></span>
                    </div>
                  </div>
