

<script>

    $( document ).ready(function() {
    $(".del-modal").click(function(){
    var delete_id = $(this).attr('data-id');
    var data_title = $(this).attr('data-title');
    var data_image = $(this).attr('data-image');
    
    $('.delete-form').attr('action','/admin/testimonial/'+ delete_id);
    $('.delete-title').html(data_title);
    $('.delete-data-image').attr('src',data_image);
  });  
});

$(".testimonial").addClass( "menu-is-opening menu-open");
$(".testimonial a").addClass( "active-menu");

/*tinymce.init({
  selector: '.editor',  // change this value according to your HTML
});*/
/*ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
            console.error( error );
        } );*/


</script>



<div class="content-wrapper">


    <section class="content">
      <div class="container-fluid">
        <div >
        
          <div >
            <div class="form-horizontal row">
            
            <div class="col-md-12">
                 
              <form id="createtestimonial" enctype="multipart/form-data" method="post" class="form-horizontal"  
              onsubmit="return false;">
                @csrf
                <input type="hidden" id="page_type" value="singleUpload">
                <div class="row mb-5">
                  <div class="col-sm-4 col-md-4">
                      <label for="client_name">Add Testimonial Title</label>
                      <input type="text" class="form-control" name="client_name" placeholder="Testimonial Name" value="{{old('client_name')}}" required>
                      <span class="text-danger">@error('client_name') {{$message}} @enderror</span>
                  </div>
                  <div class="col-sm-12 col-md-12 mt-3">
                      <label for="short_description">Add Testimonial Description</label>
                      <textarea id="editor" name="full_description" placeholder="Testimonial Descriptions">{{old('full_description')}}</textarea>
                      <span class="text-danger">@error('full_description') {{$message}} @enderror</span>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12 mt-3 row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <label for="short_description">Add Image</label>
                      <input type="file" name="image" class="file_input " id="image" require accept="image/png,image/jpeg,image/webp" required/>

                      <p class="text-danger"> <span class="text-danger">@error('image') {{$message}} @enderror</span><br> Image size for should be( 700Px   X   700Px ).<br> Supportable Format: JPG,JPEG,PNG,WEBP </p>
                      <img class="elevation-2 perview-img"   width="120"src="{{asset('adm')}}/img/no-item.jpeg">
                       <div class="col-sm-12 col-md-12 col-lg-12 row">
                        <div class="col-sm-6">
                          <label for="image_alt">Image Alt</label>
                          <input type="text" class="form-control" name="image_alt" placeholder="Image Alter Text (SEO)" value="{{old('image_alt')}}">  
                          <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                          <label for="image_title">Image Title</label>
                          <input type="text" class="form-control" name="image_title" placeholder="Product Image Title (SEO)" value="{{old('image_title')}}">        
                          <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 form-group">
                        <div class="col-sm-12 col-md-12">
                          <label for="short_description">Add Testimonial Short Description</label>
                          <textarea type="text" class="form-control mb-3" name="short_description" style="min-height: 200px;" placeholder="Testimonial Short Description" id="">{{old('short_description')}}</textarea>   
                          <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
                        </div>
                        <div class="col-sm-12 col-md-12">
                          <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1"checked />  
                          <h5> <span class="badge badge-success">Active</span></h5>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                <button type="button" onclick="addtestimonialsubmit()" class="btn btn-info btn-save"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                Save</button>
                </div>
              </form>
              </div>



          </div>
        </div>


      </div>
    </section>
  </div>


