<div id="ajaxModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="popupFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $type }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBodyContentpopup">
        @if(isset($pageData) && !empty($pageData))
          @includeWhen($type == 'About', 'admin.home-editor.about-page')
          @includeWhen($type == 'Product', 'admin.home-editor.product-page')
          @includeWhen($type == 'CaseStudies', 'admin.home-editor.casestudies-page')
          @includeWhen($type == 'Testimonial', 'admin.home-editor.testimonial-page')
          @includeWhen($type == 'Contact', 'admin.home-editor.contact-page')
          @includeWhen($type == 'Client', 'client.index')
        @endif
      </div>
    </div>
  </div>
</div>
