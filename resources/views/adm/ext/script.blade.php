
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js')}}/app.js"></script>
<!-- jQuery -->
<!-- <script src="{{asset('adm')}}/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adm')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('adm')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('adm')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
{{-- <!-- <script src="{{asset('adm')}}/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="{{asset('adm')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --> --}}

<!-- jQuery Knob Chart -->
<script src="{{asset('adm')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('adm')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('adm')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adm')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adm')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adm')}}/dist/js/demo.js"></script>
<script src="{{asset('adm')}}/drag-drop/dist/imageuploadify.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <!-- <script src="{{asset('adm')}}/dist/js/pages/dashboard.js"></script> --> --}}

<script src="{{asset('adm')}}/plugins/chart.js/Chart.min.js"></script>

<script src="{{asset('adm')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{asset('adm')}}/plugins/toastr/toastr.min.js"></script>

<script src="{{asset('adm')}}/dist/js/custom.js"></script>

<script src="{{asset('adm')}}/dist/js/demo.js"></script>

{{-- <script src="{{asset('adm')}}/dist/js/pages/dashboard2.js"></script> --}}


<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>

<link rel="stylesheet" href="{{asset('adm')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('adm')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <script src="{{asset('adm')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('adm')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('adm')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('adm')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('adm')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<script src="{{asset('adm')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{asset('adm')}}/plugins/toastr/toastr.min.js"></script>

<!-- Select2 -->
<script src="{{asset('adm')}}/plugins/select2/js/select2.full.min.js"></script>


<!-- jQuery -->
<!-- <script src="{{asset('adm')}}/plugins/jquery/jquery.min.js"></script> -->

<!-- Bootstrap 4 -->
<script src="{{asset('adm')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adm')}}/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="{{asset('adm')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- <script src="{{url('')}}/sardar/tinymce/tinymce.min.js"></script> -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/super-build/ckeditor.js"></script>

<!-- CodeMirror -->
<script src="{{asset('adm')}}/plugins/codemirror/codemirror.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/css/css.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/xml/xml.js"></script>
<script src="{{asset('adm')}}/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<script>

$('#summernote').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video', 'hr']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['height', ['height']],
      ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],
    ],
    table: [
    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
  ],
        height: 200,
  });
  $('.dropdown-toggle').dropdown();
  // alert()
  
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

  $('#subCategoryTable').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

$('.category_parent_id').on('change', function() {
    var parent = $(this).find(':selected').val();
    var html = checked = status = '';
    $('#subCategoryCheckAll').prop( "checked",false)
    $.get( `{{url('api')}}/get/getSubCategoriesList/`+parent, { category_parent_id: parent })
    .done(function( data ) {
          // alert(JSON.stringify(data));
          // console.log(data.Code);

        if(data.Code == 400){
            $('.sub_category_parent_id').html('');
        }
        else{
          $("#example2").DataTable().clear();
          var length = data.SubCategories.length;
          for(var i = 1; i < length+1; i++) {
            $('#example2').dataTable().fnAddData( [
              data.SubCategories[i].Id,
              data.SubCategories[i].Image,
              data.SubCategories[i].name,
              data.SubCategories[i].MainCategory,
              data.SubCategories[i].Status,
              data.SubCategories[i].Action
            ]);
          }
            // $('.sub_category_parent_id').empty();
            /*for(var i = 0 ; i < data.SubCategories.length; i++){
              var checked = status = '';  
              html += '<tr id="'+data.SubCategories[i].id+'"> ';
              html += '<td><input type="checkbox" class="checkList" name="checkList[]" id="checkList" value="'+data.SubCategories[i].id+'" /></td>';
              html += '<td><img class="rounded img-block m-1"  width="200"src="'+data.SubCategories[i].Image+'"/></td>'; 
              html += '<td>'+ data.SubCategories[i].name +'</td>';
              html += '<td>'+ data.SubCategories[i].MainCategory +'</td>';
              if (data.SubCategories[i].status == 1) {
                  checked += 'checked';
                  status  += '<h5> <span class="badge badge-success">Active</span></h5>';
              } else{
                status  += '<h5 for="status"> <span class="badge badge-danger">Inactive</span></h5>';
              }
              html += '<td><div class="form-check"> <input type="checkbox" class="form-check-input  pull-right" name="status" id="exampleCheck1" '+ checked +' onClick="updateStatus('+data.SubCategories[i].id+')"/>'+ status +' </div></td>'; 
              html += '<td><div class="row"> <a class="btn btn-xs btn-dark" href="'+data.SubCategories[i].EditAction+'"><i class="far fa-edit"></i></a> &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs btn-danger del-modal"  title="Delete Category" data-id="'+data.SubCategories[i].DeleteAction+'" data-title="'+ data.SubCategories[i].name +'"  data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i> </button></div></td>';
              html += '</tr>';
            }
            $('.sub_category_parent_id').append(html)*/
        }
    });
});
$('.btn-upload').click(function () { 
  $(this).children('i').addClass('bounce');
  $(this).addClass('color_black_red');
  
});


  // $(function() {
  //             var Toast = Swal.mixin({
  //               toast: true,
  //               position: 'top-end',
  //               showConfirmButton: false,
  //               timer: 3000
  //             });
              

  //             });
              
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  // $('body').hide();

</script>

<script>

$("body").on("click",".delField",function(){   
      $(this).parents(".image-block").remove();  
  });  

</script>