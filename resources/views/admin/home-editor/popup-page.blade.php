<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
/* Modal styles */
.modal {
    display: none; 
    position: relative; 
    z-index: 10000 !important; 
    left: 20;
    top: 20;
    right:20;
    bottom:20;
    width: 100% !important; 
    height: 100% !important; 
    overflow: auto !important; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 

    align-items: center !important;
    justify-content: center !important;
}

.modal-content {
    background-color: #fefefe;
    margin: 1% auto; 
    padding: 20px;
    border: 1px solid #888;
    overflow-y: auto !important ; /* Add vertical scroll */
    max-width: 80% !important;
    max-height: 80% !important; 
    position: relative !important;
}
#ajaxModal form
{
  width: 100%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<div id="ajaxModal" style="display:block;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">App Url</h5>
      </div>
      <div class="modal-body" id="modalBodyContent">
        @if(isset($pageData) && !empty($pageData))
        @if ($type == 'about')
          @include('admin.home-editor.about-page')
        @endif
        @endif
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
