@extends('adm.layout.admin-index')
@section('title','Social Media Manage')

@section('toast')
  @include('adm.widget.toast')
@endsection

@section('custom-js')
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


$(".setting").addClass( "menu-is-opening menu-open");
$(".setting a").addClass( "active-menu");

</script>
@endsection

@section('content')
@include('adm.widget.table-search-draggable')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">

    <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Settings / Social media</li>
            </ol>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="col-sm-6">
            <h3 class="mb-0">Settings / Social media</h3>
          </div>
    </div>
    
    </section>


    <div class="card-body">
                	<div class="row">
                    <div class="col-md-10">
                    <form role="form" action="{{ route('admin.setting.social-media.store') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <h5 class="text-danger text-center">Social Button</h5>
                      <table class="table">
                        <tr>
                          <td width="30%"><label for="title">Facebook</label></td>
                          <td><input type="url" class="form-control" id="facebook"  name="facebook" value="@if(old('facebook')){{old('facebook')}}@else{{$socialMedia->facebook}}@endif" placeholder="Facebook Profile"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Instagram</label></td>
                          <td><input type="text" class="form-control" id="instagram"  name="instagram" value="@if(old('instagram')){{old('instagram')}}@else{{$socialMedia->instagram}}@endif" placeholder="Instagram Profile"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Twitter</label></td>
                          <td><input type="text" class="form-control" id="twitter"  name="twitter" value="@if(old('twitter')){{old('twitter')}}@else{{$socialMedia->twitter}}@endif" placeholder="Twitter Profile"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Youtube</label></td>
                          <td><input type="text" class="form-control" id="youtube"  name="youtube" value="@if(old('youtube')){{old('youtube')}}@else{{$socialMedia->youtube}}@endif" placeholder="Youtube Channel"></td>
                        </tr>
                        <tr>
                          <td><label for="title">LinkedIn</label></td>
                          <td><input type="text" class="form-control" id="linkedin"  name="linkedin" value="@if(old('linkedin')){{old('linkedin')}}@else{{$socialMedia->linkedin}}@endif" placeholder="LinkedIn Profile"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Pinterest</label></td>
                          <td><input type="text" class="form-control" id="pinterest"  name="pinterest" value="@if(old('pinterest')){{old('pinterest')}}@else{{$socialMedia->pinterest}}@endif" placeholder="pinterest Profile"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Skype</label></td>
                          <td><input type="text" class="form-control" id="skype"  name="skype" value="@if(old('skype')){{old('skype')}}@else{{$socialMedia->skype}}@endif" placeholder="Skype Profile"></td>
                        </tr>

                        
                        <tr>
                          <td><label for="title">Email Id</label></td>
                          <td><input type="text" class="form-control" id="email"  name="email" value="@if(old('email')){{old('email')}}@else{{$socialMedia->email}}@endif" placeholder="Email Id"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Phone No</label></td>
                          <td><input type="text" class="form-control" id="phone"  name="phone" value="@if(old('phone')){{old('phone')}}@else{{$socialMedia->phone}}@endif" placeholder="Phone Number"></td>
                        </tr>
                        <tr>
                          <td><label for="title">Whatsapp No</label></td>
                          <td><input type="text" class="form-control" id="whatsapp"  name="whatsapp" value="@if(old('whatsapp')){{old('whatsapp')}}@else{{$socialMedia->whatsapp}}@endif" placeholder="Whatsapp Number"></td>
                        </tr>
                        
                        <tr>
                          <td><label for="title">Whatsapp Group</label></td>
                          <td><input type="text" class="form-control" id="whatsapp_group"  name="whatsapp_group" value="@if(old('whatsapp_group')){{old('whatsapp_group')}}@else{{$socialMedia->whatsapp_group}}@endif" placeholder="Whatsapp Group Link"></td>
                        </tr>

                        <tr>
                          <td><label for="address">Address</label></td>
                          <td><textarea type="text" class="form-control" id="address"  name="address" placeholder="Address Here">@if(old('address')){{old('address')}}@else{{$socialMedia->address}}@endif</textarea></td>
                        </tr>
  
                          <tr>
                            <td colspan="2">
                            <h5 class="text-danger text-center">API Code</h5></td>
                          </tr>

                          <tr>
                            <td><label for="title">TinyPng</label></td>
                            <td><input type="text" class="form-control" id="tinypng"  name="tinypng" 
                              placeholder="Tiny Png Api Key" 
                              value="@if(old('tinypng')){{old('tinypng')}}@else{{$socialMedia->tinypng}}@endif"></td>
                          </tr>

                          <tr>
                            <td colspan="2">
                            <h5 class="text-danger text-center">Embed Code</h5></td>
                          </tr>
                          <tr>
                            <td><label for="title">Youtube Embed</label></td>
                            <td><textarea type="text" class="form-control" id="twitter"  name="youtube_embed" 
                              placeholder="Youtube Embed Code">@if(old('youtube_embed')){{old('youtube_embed')}}@else{{$socialMedia->youtube_embed}}@endif</textarea></td>
                          </tr>
                          <tr>
                            <td><label for="title">Google Map Embed</label></td>
                            <td><textarea type="text" class="form-control" id="map_embed"  name="map_embed" 
                              placeholder="Google Map Embed">@if(old('map_embed')){{old('map_embed')}}@else{{$socialMedia->map_embed}}@endif</textarea></td>
                          </tr>
                        
                        <tr>
                          <td><label for="title">Facebook Embed</label></td>
                          <td><textarea type="text" class="form-control" id="facebook_embed"  name="facebook_embed" 
                          placeholder="Signal Group Link">@if(old('facebook_embed')){{old('facebook_embed')}}@else{{$socialMedia->facebook_embed}}@endif</textarea></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2">
                          <h5 class="text-danger text-center">Product</h5></td>
                        </tr>

                        <tr>
                          <td><label for="title">Product Title</label></td>
                          <td><textarea type="text" class="form-control" id="facebook_embed"  name="product_title" 
                          placeholder="Product Title">@if(old('product_title')){{old('product_title')}}@else{{$socialMedia->product_title}}@endif</textarea></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td><input type="submit" class="btn btn-success just" id="btn-social-media"  name="btn-social-media" 
                          value="Update Social Media"></td>
                        </tr>

                      </table>
                      </form>
                  </div>
                </div>
                </div>
                </div>


@endsection