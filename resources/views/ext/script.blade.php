
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
   
<!-- Laraberg CSS -->
<link rel="stylesheet" href="{{ asset('vendor/laraberg/css/laraberg.css') }}">

<!-- Laraberg JS -->
<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>


<script src="https://unpkg.com/react@16.6.3/umd/react.production.min.js"></script>

<script src="https://unpkg.com/react-dom@16.6.3/umd/react-dom.production.min.js"></script>

<script src="https://unpkg.com/moment@2.22.1/min/moment.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="{{asset('/')}}/js/popper.min.js"></script>
<script src="{{asset('/')}}/js/bootstrap.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="{{asset('/')}}/js/custom.js"></script>
<script type="text/javascript" src="{{asset('sardar')}}/js/slick.min.js"></script>
<script src="{{asset('lightjs')}}/js/lightgallery.min.js"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6142d467a2a5620019d2708a&product=sop' async='async'></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{asset('/')}}/plugins/toastr/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazyloadjs/3.2.2/lazyload.min.js" integrity="sha512-3WLY2nDlx1c6leUk3gyqneF+bWq4Ub/HsGjmJoo7qRlMFMXcOwzw6gqf+PwKLzd/TUjWlpSaHBy6L6o1hS2y9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(session('LoggedUser'))

  <script src="{{asset('/')}}js/onscreen-cms.js" rel="stylesheet"></script>
@endif

  <script type="text/javascript">
  	$('.inflatables_slider').slick({
      arrows: true,
      infinite: true,
      speed:300,
      autoplay: true,
      slidesToShow:3,
      slidesToScroll:1,
      centerPadding: '50px',
      centerMode: false,
      responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint: 767,
          settings: {
            arrows: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });  

    $('.ExploreNowslider').slick({
      arrows: true,
      infinite: true,
      speed:300,
      autoplay: true,
      slidesToShow:5,
      slidesToScroll:1,
      centerPadding: '20px',
      centerMode: false,
      responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:3
          }
        },
        {
          breakpoint:1000,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint:767,
          settings: {
            arrows: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });  

    $('.inflatables_slider_block').slick({
      arrows: true,
      infinite: true,
      speed:300,
      autoplay: true,
      slidesToShow:3,
      centerPadding: '20px',
      centerMode: false,
      responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:3
          }
        },
        {
          breakpoint:1000,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint:767,
          settings: {
            arrows: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });  
    // $('body').hide();
  </script>
   
   <script src="https://www.google.com/recaptcha/api.js?render=6Ld3ciIdAAAAAD_i8lRU0HuO7OHycIBbZb3Q7OMm"></script>
   <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ld3ciIdAAAAAD_i8lRU0HuO7OHycIBbZb3Q7OMm', { action: 'submit' }).then(function (token) {
              $('.token_response').val(token);
            });
        });

    </script>
    
<script>
  

$(".contact-submission").submit(function(e) {
// alert('clicked');
e.preventDefault(); // prevent actual form submit
// alert('clicked');
var form = $(this);
var url = form.attr('action'); //get submit url [replace url here if desired]

// $("#modalForm").trigger("reset");


$.ajax({
     type: "POST",
     url: url,
     data: form.serialize(), // serializes form input
     success: function(res){
      
      if(res == 'success'){
        window.location = "{{route('thankyou')}}";
      }else{
        alert('Something went wrong! Please refresh page and try it again...');
      }

     }
});
});

$(document).mouseup(function (e) {
if ($(e.target).closest(".top-form").length === 0) {
      $(".top-form").hide();
}

});

$('.navbar-toggler').click(function (e) { 
  // alert('menu');
  $('.top-form').hide();
  $('#navbarNav').toggle();

  // alert($('.navbar-toggler').height());
});

$('.two_controls').click(function (e) { 

  // $('#navbarNav').toggle();
});

$('#open_btn').click(function (e) { 
  e.preventDefault();
  // alert('opem');
  $('.navbar-toggler').hide();
  $('.enquiry_form_modal').show();
});

// $('.active').parent('.subMenu').css('display', 'block');
// $( ".active" ).parent( ".subMenu" ).css( "background", "yellow" );

$('.activeMenu').parents().eq(2).css({
          "display" : "block",
          "border" : "1px solid white"
      });
      
  $('.activeMenu').parents().eq(3).children('.item').addClass("active");

</script>

<?php

$footerCode = DB::table('custom_codes')->where('type', 'footer-code')->first();
echo $footerCode->description;

?>
@if(Session::get('success'))
  <script>
    $(function() {
      // alert();
      /*var Toast = Swal.mixin({
        toast: true,
        // position: 'bottom',
        showConfirmButton: false,
        timer: 3000
      });*/
    });
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
            
           }
      });
    };
    toastr.success(`{{ Session::get('success')}}`);
  </script>

  @if(Session::get('close'))
    <script>
      setTimeout(myGreeting, 5000);
      function myGreeting() {
        // window.top.close();
        $('.onscreenCloseBtn').trigger("click");
      }
    </script>
  @endif

@elseif(Session::get('fail'))

<script>
    $(function() {
      /*var Toast = Swal.mixin({
        toast: true,
        // position: 'bottom',
        showConfirmButton: false,
        timer: 3000
      });*/
    });
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
            
           }
      });
    };
    toastr.error(`{{Session::get('fail')}}`);
  </script>

@endif
