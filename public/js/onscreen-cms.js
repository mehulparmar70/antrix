var base_url =window.location.origin;
var url = base_url+"/flat";
console.log('base_url',url);
// window.addEventListener('beforeunload', function(event) {
//   parent.console.info('I am the 2nd one.');
//   alert('aaaa');
//   return false;
// });
// window.addEventListener('unload', function(event) {
//   console.log('I am the 4th and last one…');
// });
// console.log('I am the 4th and last one…');

// window.onbeforeunload = function (event) {
//   var message = 'Sure you want to leave?';
//   if (typeof event == 'undefined') {
//     event = window.event;
//   }
//   if (event) {
//     event.returnValue = message;
//   }
//   return message;
// }

// $(window).bind('beforeunload', function(e) {
//   // Your code and validation
//   if (confirm) {
//       return "Are you sure?";
//   }
// });


$(document).ready(function(){
  var screen = $(window).width();
  var popupWinWidth = 990;
  var left = (screen - popupWinWidth) / 2;
  
  // var top = (screen.height - popupWinHeight) / 4;
    
  // var myWindow = window.open(pageURL, pageTitle, 
  //         'resizable=yes, width=' + popupWinWidth
  //         + ', height=' + popupWinHeight + ', top='
  //         + top + ', left=' + left);
var currentWindow;

  $('.navbar-brand, .logo-g').each(function(){
    $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+
    `"class='onscreen-logo' onclick="currentWindow = window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+
    `', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> 
    <i class='fa fa-edit'></i></a>`);
  });


// if(currentWindow){
//   currentWindow.close()
//   alert(currentWindow);

// }
// $('.logo-g, .product, .about, .testimonial, .blog, .contact,.menu_crud').each(function(){
//   $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-menu adminEditItem' title="Edit" onclick="popupopen('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
// });

$('.logo-g, .product, .about, .testimonial, .blog, .contact,.menu_crud').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-menu adminEditItem' title="Edit" onclick="popupmenu('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});

$('.content_banners').each(function(){
  $(this).append(`<a class="onscreen-banner-slider" href="`+$(this).attr('data-link')+`"class='onscreen-menu adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});




$('.modal .close').on('click', function() {
  $('#ajaxModal').css('display', 'none');
});

// Close the modal when clicking outside of it
$(window).on('click', function(event) {
  if ($(event.target).is('#ajaxModal')) {
      $('#ajaxModal').css('display', 'none');
  }
});

// $('.onscreen-product-image').each(function(){
//   $(this).append(`<div class="onscreen-product-title image">
//   <a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;">
//   <i class='fa fa-edit'></i></a><a href="#" class="deleteImage"><i class='fa fa-trash'></i></a>`);
// });

$('.onscreen-product-image').each(function(){
  $(this).append(`<div class="onscreen-product-image1 image">
  <span class="deleteImage"><i class='fa fa-trash'></i></span>`);
});

$('.product_title_main').each(function(){
  $(this).prepend(`<div class="onscreen-product-title"><a class="adminAddItem" title="Add" href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" data-msg="This action will delete Main-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now" href="`+$(this).attr('data-delete-link')+`"> <i class='fa fa-trash'></i></a>`);
});

$('.product_title').each(function(){
  var html = `<div class="onscreen-our-product"><a class="adminAddItem" title="Add" href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  html += `<a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`;
  if ($(this).attr('data-delete-link') != undefined) {
    html += `<a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg='This action will delete Main-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now'> <i class='fa fa-trash'></i></a>`;
  }
  $(this).prepend(html);
});

$('.onscreen_media_testimonial_title').each(function(){
  $(this).prepend(`<div class="onscreen-media-title-link"><a style="font-size:18px !important" class="adminAddItem" title="Add" href="`+$('.route-testimonial-create').text()+`"onclick="window.open('`+$('.route-testimonial-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a style="font-size:18px !important" class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a style="font-size:18px !important" class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_media_video_title').each(function(){
  $(this).prepend(`<div class="onscreen-media-video-link"><a href="`+$('.route-video-create').text()+`"onclick="window.open('`+$('.route-video-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});


$('.onscreen_media_blog_title').each(function(){
  $(this).prepend(`<div class="onscreen-media-blog-link"><a href="`+$('.route-blog-create').text()+`"onclick="window.open('`+$('.route-blog-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});


$('.onscreen_media_testimonial_item').each(function(){
  var html = `<div class="onscreen-media-testimonial-item-link" style="position: absolute;margin-left: 87%;display: flex;">`;
  
  if ($(this).attr('data-create-link') != undefined) {
    html += `<a class="adminAddItem" title="Add" href="`+$(this).attr('data-create-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-create-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  } else {
    html += `<a class="adminAddItem" title="Add" href="`+$('.route-testimonial-create').text()+`"onclick="window.open('`+$('.route-testimonial-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  }
  html += `<a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`" data-msg='This will delete testimonial Permanently. Do you want to continue?'> <i class='fa fa-trash'></i></a>`;
  $(this).prepend(html);
});
$('.onscreen_media_casestudies_item').each(function(){
  var html = `<div class="onscreen-media-testimonial-item-link" style="position: absolute;margin-left: 87%;display: flex;">`;
  
  if ($(this).attr('data-create-link') != undefined) {
    html += `<a class="adminAddItem" title="Add" href="`+$(this).attr('data-create-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-create-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  } else {
    html += `<a class="adminAddItem" title="Add" href="`+$('.route-testimonial-create').text()+`"onclick="window.open('`+$('.route-testimonial-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  }
  html += `<a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`" data-msg='This will delete testimonial Permanently. Do you want to continue?'> <i class='fa fa-trash'></i></a>`;
  $(this).prepend(html);
});

$('.onscreen_media_industries_item').each(function(){
  $(this).prepend(`<div class="onscreen-media-industries-item-link">
  <a class="adminAddItem" title="Edit" href="`+$(this).attr('data-create-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-create-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`" data-msg='This action will delete QuickView & photos permanently If you are sure about this, then Press OK  or Press Cancel Now'> <i class='fa fa-trash'></i></a>`);
});


$('.onscreen_media_video_item').each(function(){
  $(this).prepend(`<div class="onscreen-media-video-item-link">
  <a href="`+$('.route-video-create').text()+`"onclick="window.open('`+$('.route-video-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"><i class='fa fa-plus'></i></a>
  <a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a href="`+$(this).attr('data-delete-link')+`" data-msg='This will delete Video Permanently. Do you want to continue?''> <i class='fa fa-trash'></i></a>`);

});

$('.onscreen_media_blog_item').each(function(){
  $(this).prepend(`<div class="onscreen-media-blog-item-link">
  <a href="`+$('.route-blog-create').text()+`"onclick="window.open('`+$('.route-blog-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a href="`+$(this).attr('data-delete-link')+`" data-msg='This will delete Blog Permanently. Do you want to continue?'> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_explore_now_main_category').each(function(){
  $(this).prepend(`<div class="onscreen-explorenow-maincategory-link"><a href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$('route-category-list').text()+`"onclick="window.open('`+$('.route-category-list').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});


$('.onscreen_explore_now_sub_category').each(function(){
  $(this).prepend(`<div class="onscreen-explorenow-subcategory-link"><a href="`+$(this).attr('data-create-subcategory')+`"onclick="window.open('`+$(this).attr('data-create-subcategory')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-delete-link')+`" data-msg='This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now'> <i class='fa fa-trash'></i></a>`);
});


$('.facebooks_post_block, .google_map_block').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-connect-block' onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});


$('.footer_logo_block').each(function(){
  $(this).after(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-connect-logo-block' onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});


$('.social_footer').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-social-logo-block adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});

$('.footer_page_link_information').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='footer-page-link-information' onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});

$('.footer_page_blog_information').each(function(){
  $(this).after(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='footer-page-link-blog' onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});

$('.TopContent, .FieldsTexts').each(function(){
  $(this).before(`<a  href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='top-content-pages adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});

$('.onscreen_product_internal_title2').each(function(){
  $(this).prepend(`<div class="onscreen-product-internal-title-link2"><a href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_product_internal_title3').each(function(){
  $(this).prepend(`<div class="onscreen-product-internal-title-link3"><a class="adminAddItem" title="Add" href="`+$(this).attr('data-create-subcategory')+`"onclick="window.open('`+$(this).attr('data-create-subcategory')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);
});

$('.header_crud').each(function(){
  $(this).prepend(`<a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-menu adminAddItem' title="Add" onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-menu adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"class='onscreen-menu adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});

$('.crud').each(function(){
  $(this).prepend(`<a class="adminAddItem" title="Add" href="`+$(this).attr('data-create')+`"onclick="window.open('`+$(this).attr('data-create')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This will delete data Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);
});

$('.title-crud').each(function(){
  $(this).prepend(`<a class="adminAddItem" title="Add" href="`+$(this).attr('data-create')+`"onclick="window.open('`+$(this).attr('data-create')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-delete')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});

$('.clients_crud').each(function(){
  $(this).prepend(`<a style="font-size: 18px !important;" class="adminAddItem" title="Add" href="`+$('.data-create').text()+`"onclick="window.open('`+$('.route-video-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a style="font-size: 18px !important;" class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a style="font-size: 18px !important;" class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+` data-msg="This will delete Video Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_popup_block').each(function(){
  $(this).before(`<div class="onscreen-popup-title-link">
  <a class="adminAddItem" title="Add" href="`+$('.route-testimonial-create').text()+`"onclick="window.open('`+$('.route-testimonial-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This will delete testimonial Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_popup_crud').each(function(){
  $(this).before(`<div class="onscreen-popup-title-link">
  <a class="adminAddItem" title="Add" href="`+$(this).attr('data-create-link')+`"onclick="window.open('`+$(this).attr('data-create-link')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This will delete Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_video_popup_block').each(function(){
  $(this).before(`<div class="onscreen-popup-title-link"><a class="adminAddItem" title="Add" href="`+$('.route-video-create').text()+`"onclick="window.open('`+$('.route-video-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This will delete Video Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);

});


$('.onscreen_page_blog_block').each(function(){
  $(this).before(`<div class="onscreen-popup-title-link"><a class="adminAddItem" href="`+$('.route-blog-create').text()+`"onclick="window.open('`+$('.route-blog-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>
  <a class="adminEditItem" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" href="`+$(this).attr('data-delete-link')+`"data-msg="This will delete Blog Permanently. Do you want to continue?"> <i class='fa fa-trash'></i></a>`);


});

$('.onscreen_blog_detail_page').each(function(){
  $(this).before(`<div class="onscreen-popup-title-link"><a class="adminAddItem" title="Add" href="`+$('.route-blog-create').text()+`"onclick="window.open('`+$('.route-blog-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" href="`+$('route-blog-index').text()+`"onclick="window.open('`+$('.route-blog-index').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});

$('.product_internal_title').each(function(){
  // $(this).prepend(`<div class="onscreen-product-internal-title-link"><a class="adminAddItem" title="Add" href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);
  var html = '';
  if ($(this).attr('data-create-link') != undefined) {
    html += `<a class="adminAddItem" title="Add" href="`+$(this).attr('data-create-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-create-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  } else {
    html += `<a class="adminAddItem" title="Add" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a>`;
  }
  html += `<a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>
  <a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`" data-msg="This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`;
  $(this).prepend(html);

});

$('.product_internal_title_slick').each(function(){
  $(this).append(`<div class="onscreen-product-internal-title-link"><a class="adminAddItem" title="Add" href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Sub-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_left_sidebar_list').each(function(){
  $(this).prepend(`<div class="onscreen-left-sidebar-list-link"><a href="`+$('.route-sub-category-create').text()+`"onclick="window.open('`+$('.route-sub-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$('route-sub-category-list').text()+`"onclick="window.open('`+$('.route-sub-category-list').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});

$('.onscreen_product_main_category_title').each(function(){
  $(this).prepend(`<div class="onscreen-product-maincategory-title-link"><a href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$('route-category-list').text()+`"onclick="window.open('`+$('.route-category-list').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
});


$('.onscreen_product_main_category_title2').each(function(){
  $(this).prepend(`<div class="onscreen-product-maincategory-title-link2"><a class="adminAddItem" title="Add" href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a class="adminDeleteItem" title="Delete" href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Main-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);
});
// Menu Item
$('.onscreen_product_main_category_menu').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"class='onscreen-menu adminEditItem' title="Edit" onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'  style="color: black !important;"></i></a>`);
});

//   $(this).append(`<div class="onscreen-product-detail-slider-thumb"><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$(this).attr('data-delete-link')+`"data-msg="This action will delete Main-Category & photos permanently If you are sure about this, then Press OK  or Press Cancel Now"> <i class='fa fa-trash'></i></a>`);

$('.my_slider_thumb').each(function(){
  $(this).append(`<span class="deleteImageSlider" data-id="`+$(this).attr('data-delete-link')+`"><i class='fa fa-trash'></i></span>`);
});

$('body').on('click','.adminDeleteItem',function (e) { 
  var mainClass = $(this).parent().parent().parent().attr('class');
  var isClass = 'showIndustriesImg';
  
  if (mainClass.indexOf(isClass) != -1) {
    $(this).parent().parent().parent().addClass('isDelete')
  }
  
  e.preventDefault();
  var msg = $(this).data('msg');
  if(confirm(msg)){
    // location.reload();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      success: function (response) {
        // location.reload();
        toastr.options = {
            "positionClass": "toast-top-center",
            "showEasing": "swing",
            "showMethod": "show",
        };
        toastr.options.timeOut = 3000;
        toastr.options.fadeOut = 3000;
        toastr.success(response.success);
        setTimeout(pageLoadFun, 3000)
        toastr.options.onHidden = function(){
            $.ajax({
               type: "GET",
               url: "{{url('')}}/destorySession",
               success: function(res){
                  location.reload();
               },fail:function(){
                  location.reload();
               }
          });
        };
        
      },
      fail: function(xhr, textStatus, errorThrown){
        toastr.options = {
            "positionClass": "toast-top-center",
            "showEasing": "swing",
            "showMethod": "show",
        };
        toastr.options.timeOut = 3000;
        toastr.options.fadeOut = 3000;
        toastr.options.onHidden = function(){
            $.ajax({
               type: "GET",
               url: "{{url('')}}/destorySession",
               success: function(res){
                location.reload();
               }
          });
        };
        toastr.success("Data Deleted successfully","success");
      }
    });
  }
})
$('.deleteImageSlider').click(function (e) { 
  e.preventDefault();
  if(confirm("This will delete photo Permanently. Do you want to continue?")){
    var url = $(this).attr('data-id');
    $.ajax({
      type: "post",
      url: url,
      success: function (response) {
        location.reload();
      }
    });
  }
  else{
      return false;
  }
});
// Product Photo Image
$('.BigInnerinflatableSub_slider').each(function(){
  $(this).prepend(`<div class="onscreenCmsIconWraper"><div class="onscreen-product-maincategory-title-link3"><a class="adminAddItem" title="Add" href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a class="adminEditItem" title="Edit" href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a></div>`);
});


  $('.deleteImage').click(function (e) { 
    e.preventDefault();
    if(confirm("This will delete photo Permanently. Do you want to continue?")){
      
      var url = $(this).parent().parent().parent().children('.slick-current').attr('data-id');
      $.ajax({
        type: "post",
        url: url,
        success: function (response) {
          location.reload();
        }
      });
    }
    else{
        return false;
    }
  
    // alert($(this).parent().parent().parent().children('.slick-current').attr('data-id'));
});


function pageLoadFun() {
  location.reload();
}

// $('.onscreen-product-image').each(function(){
//   $(this).append(`<div class="onscreen-product-image-slider"><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+'&onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a><a href="`+$('.route-category-list').text()+`"onclick="window.open('`+$(this).attr('data-link')+'&onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-trash'></i></a>`);
// });

$('.onscreen_top_inflatable').each(function(){
  $(this).append("<a href="+$(this).attr('data-link')+'?onscreenCms=true'+" class='onscreen-edit2'><i class='fa fa-edit'></i></a>");
});

$('.about_part, .our_clients').each(function(){
  $(this).append(`<a style="font-size: 18px !important;" class='onscreen-block adminEditItem' title="Edit" href="`+$(this).attr('data-link')+'?onscreenCms=true'+`"onclick="window.open('`+$(this).attr('data-link')+'?onscreenCms=true'+`', 'toolbar=no, location=no','left=`+left+`,width=`+popupWinWidth+`,height=860'); return false;"> <i class='fa fa-edit'></i></a>`);
});


$('.testOnload').append("<a href="+$('.testOnload').attr('data-link')+'?onscreenCms=true'+" class='onscreen-logo'><i class='fa fa-edit'></i></a>");


  $('.navbar-brand, .logo-g, .home, .product, .about').each(function(){
    // $(this).child("data-link").hide();
  
  });
  
});


function popupmenu(link,toolbar, location,left,width, height)
{
  $.ajax({
    url: link,
    method: 'GET',
    success: function(data) {
        // Load the content into the modal
        $('#modalBodyContent').html(data);
        $('#ajaxModal').css('display', 'block');
        $('#ajaxModal').css('position', 'absolute');
        $('#ajaxModal').css('z-index', '10000');
        $('.preloader').css('display', 'none');
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error loading content: ' + textStatus);
    }
});
}

function saveData(event) {
  event.preventDefault(); // Prevent the default form submission
  var form = $('#ajaxForm'); // Select the form
  var formData = new FormData(form[0]); // Create FormData object with the form data

  $.ajax({
      url: form.attr('action'), // Use the form's action attribute
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
          // Handle success
          console.log(response);
        
          console.log('Form submitted successfully.');
          $('#ajaxModal').css('display', 'none'); // Close the modal
          location.reload(); 
          // Optionally, update the content on the main page if needed
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log('Error submitting form: ' + textStatus);
      }
  });
}

$(document).ready(function() {
  $(document).on('submit', '#ajaxForm', saveData); // Bind the submit event to the form using event delegation
});