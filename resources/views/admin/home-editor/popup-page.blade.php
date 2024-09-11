<div id="ajaxModal" 
     class="modal {{ $type }}" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="popupFormLabel" 
     aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $type }}</h5>
        <button type="button" class="close" aria-label="Close" onclick="closeModal('{{ $type }}')">
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
          @includeWhen($type == 'client_edit', 'client.edit')
          @includeWhen($type == 'Award', 'award.index')
          @includeWhen($type == 'award_edit', 'award.edit')
          @includeWhen($type == 'newsletter', 'newsletter.index')
          @includeWhen($type == 'newsletter_add', 'newsletter.create')
          @includeWhen($type == 'IndustriesPage', 'admin.home-editor.industrie-page')
          @includeWhen($type == 'video', 'video.index')
          @includeWhen($type == 'partners', 'partners.index')
          @includeWhen($type == 'category', 'category.index')
          @includeWhen($type == 'homeedit', 'admin.home-editor.index')
          @includeWhen($type == 'EditClient', 'admin.home-editor.client-page')
          @includeWhen($type == 'EditAward', 'admin.home-editor.awards-page')
          @includeWhen($type == 'Editnewsletter', 'admin.home-editor.newsletter-page')
       
          @includeWhen($type == 'Casestudies', 'casestudies.index')
          @includeWhen($type == 'casestudies_edit', 'casestudies.edit')
          @includeWhen($type == 'Slider', 'slider.index')
          @includeWhen($type == 'EditSlider', 'slider.edit')
          @includeWhen($type == 'Industries', 'industries.index')
          @includeWhen($type == 'industries_edit', 'industries.edit')

        @elseif(isset($sliders) && !empty($sliders))
          @includeWhen($type == 'Slider', 'admin.home-editor.slider-page')
        @endif
        @includeWhen($type == 'AddIndustries', 'industries.create')
        @includeWhen($type == 'Create Main Category', 'admin.home-editor.main-category')
      </div>
    </div>
  </div>
</div>
