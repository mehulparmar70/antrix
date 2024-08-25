<form id="ajaxForm" method="post" enctype="multipart/form-data" class="form-horizontal" action="{{ route('admin.page-editor.store') }}">
    @csrf

    <div class="card-body p-2">
        <!-- Main Category and Custom URL Section -->
        <div class="form-group row">
            <!-- <div class="col-md-4">
                <label for="main_category">Add Main Category</label>
                <input type="text" class="form-control" name="main_category" placeholder="Add Main Category">
            </div> -->
            <div class="col-md-6">
                <label for="custom_url">Add Custom URL</label>

                        <input type="text" class="form-control" name="page_url" 
                          placeholder="Custom Url" value="<?= $url_list[0]['url']?>">
                          <input type="hidden" class="form-control" name="page_name" 
                          placeholder="Custom Url" value="<?= $url_list[0]['name']?>">
                        <span class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control" name="short_description" placeholder="Short Description">
            </div>
        </div>

        <!-- Description Section -->
        <div class="form-group">
            <label for="description">Add Description</label>
            <textarea id="editor" name="description" placeholder="About Descriptions" class="form-control">{{ $pageData->description }}</textarea>
            <span class="text-danger">@error('description') {{ $message }} @enderror</span>
        </div>

        <!-- Feature Image Upload Section -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="feature_image">Add Feature Image</label>
                <div class="input-group">
                    <input type="file" class="custom-file-input" id="feature_image" name="feature_image">
                    <label class="custom-file-label" for="feature_image">Choose file</label>
                </div>
                <div id="imagePreview" class="mt-3">
                    <!-- Image previews will be dynamically loaded here -->
                </div>
            </div>

            <!-- SEO Content Section -->
            <div class="col-md-6">
                <label>Add SEO Contents</label>
                <input type="text" class="form-control mb-2" name="seo_title" placeholder="SEO Title">
                <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="SEO Keywords">
                <textarea class="form-control mb-2" name="seo_description" placeholder="SEO Description"></textarea>

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

                <input type="text" class="form-control mt-2" name="canonical_url" placeholder="Canonical URL">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="active" value="1" id="active" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
            </div>
        </div>

        <!-- Form Footer Buttons -->
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save & Close</button>
            <button type="submit" class="btn btn-info" name="save_and_create_sub_category"><i class="fa fa-plus" aria-hidden="true"></i> Save & Create Sub Category</button>
        </div>
    </div>
</form>
