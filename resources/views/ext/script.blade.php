
<script src="{{url('/')}}/js/popper.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/custom.js"></script>

  <script type="text/javascript" src="{{url('/')}}/js/slick.min.js"></script>


  <script src="{{url('lightjs')}}/js/lightgallery.min.js"></script>
  

<!--owlcarousel-->

<!--main css-->
<link href="{{url('tfi')}}/css/main.css" rel="stylesheet">
<link href="{{url('tfi')}}/css/custom.css" rel="stylesheet">
<!--main css-->

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
e.preventDefault(); // prevent actual form submit
// alert('clicked');
var form = $(this);
var url = form.attr('action'); //get submit url [replace url here if desired]


// $("#modalForm").trigger("reset");


$.ajax({
     type: "POST",
     url: url,
     data: form.serialize(), // serializes form input
     success: function(data){
      console.log(data);
        // $('input[type=text], input[type=number], input[type=email], select, textarea').val('');

      
      if(data.status== 'success'){
        alert('Thank you for showing interest in our work and sending us the quote request. We will get back to you within 24 hours.');
        // $('#enquiry_form_modal').modal('show')

        $('input[type=text], input[type=number], input[type=email], select, textarea').val('');
      }else{
        alert('Something went wrong! Please refresh page and try it again...');
        
        $('input[type=text], input[type=number], input[type=email], select, textarea').val('');
        $('.top-form').hide();
        
        // $('#contactFailModal').modal('show')
      }

     }
});
});

$('#open_btn').click(function (e) { 
  e.preventDefault();
  // alert('opem');
  $('.enquiry_form_modal').show();
});



</script>

<?php

$footerCode = DB::table('custom_codes')->where('type', 'footer-code')->first();
echo $footerCode->description;

?>