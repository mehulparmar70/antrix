
                  <div class="form-group row">
                    <div class="col-sm-12 row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                        <label  class="col" class="text-danger" for="image">Featured Image</label>
                        <input type="file" class="file_input" name="image" accept="image/png,image/jpeg,image/webp">
                        <input type="hidden" id="page_type" value="singleUpload">
                        <!-- <div class="dropzone-wrapper">
                          <div class="dropzone-desc">
                            <i class="glyphicon glyphicon-download-alt"></i>
                            <p>Choose an image file or drag it here.</p>
                          </div>
                          <input type="file" name="image" class="dropzone" id="filePhoto" accept="image/png,image/jpeg">
                        </div> -->
                        <!-- <div class="dropzone-wrapper">
                          <div class="dropzone-desc">
                            <i class="glyphicon glyphicon-download-alt"></i>
                            <p>Choose an image file or drag it here.</p>
                          </div>
                          <input type="file" name="img_logo" class="dropzone">
                        </div> -->
                        <!-- <div class="uploader col-md-12 col-sm-12 col-lg-12" onclick="$('#filePhoto').click()">
                            <span style="font-size: 24px;display: inline-block;color: #3AA0FF;padding-top: 19px;">
                              <i class="fa fa-cloud-upload"></i><br>
                              Drag&Drop Your File(s)Here To Upload
                            </span>
                            <img src=""/>
                            <input type="file" name="image"  id="filePhoto" accept="image/png,image/jpeg"/>
                        </div> -->
                        <!-- <input type="file"  name="image" 
                        placeholder="Featured Image"
                         value="@if(old('image')){{old('image')}}@else{{$pageData->image}}@endif"
                         
                         accept="image/png,image/jpeg" /> -->

                        <input type="hidden" name="old_image" value="{{$pageData->featured_image}}">

                        <span class="text-danger"></span>

                        <p class="text-danger">
                          Image size should be( 400Px   X   400Px ).<br>
                          Supportable Format: JPG,JPEG,PNG,WEBP.<br>
                          <!-- <span>* </span>This Image will Display in OG Tag -->
                        </p>
                        </div>
                        <div class="col-md-2 col-sm-6 col-lg-6">
                          <?php 
                          // print_r($pageData);
                          // $imageFile = asset('web').'/media/xs/'.$pageData->featured_image; 
                          $imageFile = public_path().'/web/media/lg/'.$pageData->featured_image; 
                          // print_r();
                          ?>
                          @if(!file_exists($imageFile))
                          <img class="elevation-2 perview-img"   width="120"
                          src="{{asset('adm')}}/img/no-item.jpeg">
                          @elseif($pageData->featured_image)
                          <div class="image-area">
                            <img class="object-fit perview-img" width="300" src="{{asset('web')}}/media/lg/{{$pageData->featured_image}}">
                            <a class="remove-image" href="#" data-id="{{ $pageData->id }}" data-table="pages" data-field="featured_image" data-url="{{url('api')}}/media/image-delete/{{$pageData->id}}" style="display: inline; position: absolute; top: -10px; border-radius: 10em; padding: 2px 6px 3px; text-decoration: none; font: 700 21px/20px sans-serif;"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                          </div>
                          @else
                          <img class="elevation-2 perview-img"   width="120"
                          src="{{asset('adm')}}/img/no-item.jpeg">
                          @endif
                          </div>

                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)"   
                          value="@if(old('image_alt')){{old('image_alt')}}@else{{$pageData->image_alt}}@endif">
                      
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-6">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Image Title (SEO)" 
                          value="@if(old('image_title')){{old('image_title')}}@else{{$pageData->image_title}}@endif">
                      
                          
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div>
                    </div>
                    
