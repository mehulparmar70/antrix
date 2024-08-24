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
    padding: 40px; /* Increased padding for a bigger box feel */
    border: 1px solid #888;
    overflow-y: auto; /* Add vertical scroll */
    max-width: 90% !important; /* Increased width */
    max-height: 90% !important; /* Increased height */
    position: relative;
    box-shadow: 0 5px 15px rgba(0,0,0,.5); /* Add shadow for a more pronounced effect */
    border-radius: 8px; /* Rounded corners */
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
<div id="ajaxModal" >
  <div class="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $type?></h5>
      </div>
      <div class="modal-body" id="modalBodyContentpopup">
        @if(isset($pageData) && !empty($pageData))
        @if ($type == 'About')
          @include('admin.home-editor.about-page')
        @endif
        @endif
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
