
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
    

   
      <div class="container-fluid">

        <div >
          <div class="">
            <div class="form-horizontal row">
            
            <div class="col-md-12 ">
              <div class="  ">
             
                <form  id="ajaxForm"  method="post" enctype="multipart/form-data" 
                class="form-horizontal" 
                action="{{route('admin.page-editor.store')}}">
                  @csrf

                  <input type="hidden" name="type" value="home_page">             
                  <div class="card-body p-2">
                    <div class="form-group row">
                      
                      <div class="col-sm-8 mt-4 mb-4">
                        <label  class="" for="meta_description">Page Short Description</label>
                        <textarea type="text" class="form-control" name="page_title" 
                          placeholder="Page Short Description">@if(old('page_title')){{old('page_title')}}@else{{$homeAbout->page_title}}@endif</textarea>
                        <span class="text-danger"></span>
                      </div>
                      
                      <div class="col-sm-12">
                          <label class="text-dark" for="search_index">Home Page Description</label>
                          <textarea id="editor" name="description" placeholder="Product Descriptions">
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
            
            <!-- <div class="col-md-6 card card-theme">
                <div class="card card-theme">
                    <div class="card-header">
                        <h3 class="card-title">Click & Explore</h3>
                    </div>
                
              
                </div>

                
                <div class="col-md-6 card card-theme">
                  <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ALL INFLATABLES List</h3>
                    </div>
                
                    <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($homeUrls1 as $homeUrl1)
                            <tr>
                                <td>{{$homeUrl1->title}}</td>
                                <td  style="max-width: 270px;">{{$homeUrl1->url}}</td>
                                <td>@if($homeUrl1->status == 0)<p class="badge badge-danger">Inactive</p>@else<p class="badge badge-success">Active</p>@endif</td>
                                
                                <td>
                                
                                <button class="btn btn-xs btn-danger del-modal float-left"  title="Delete homeUrl1"  data-id="{{ $homeUrl1->id}}" 
                                    data-url="{ $homeUrl1->url}}" data-title="{{ $homeUrl1->title}}"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                                </button>
                            
                            
                            </td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                        
                    </div>
                    </div>


                </div>
              </div>

             </div> -->


      </div>
   
  </div>

