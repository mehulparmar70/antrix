<div id="ajaxModal" 
     class="cmsModal modal {{ $type }}" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="popupFormLabel" 
     aria-hidden="true">
  <div class="cmsModal-dialog " role="document">
    <div class="cmsModal-content">
      <div class="cmsModal-header">
        <h5 class="cmsModal-title" id="modalTitleId">{{ $type }}</h5>
        <div class="cmsModal-cta">
                        <!-- <a href="javascript:void(0);" class="cmsLinkBtn green">
                            <span class="icon">&times</span>
                            Save & Exit
                        </a> -->
                   
                        <a href="javascript:void(0);" type="button" class="cmsLinkBtn red" aria-label="Close" onclick="closeModal('{{ $type }}')">
                        <span class="icon">&times</span>
                        Exit without saving
        </a>
                    </div>
       
      </div>
      <div class="cmsModal-body" id="modalBodyContentpopup">
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
          @includeWhen($type == 'Main_Category', 'category.edit')
          @includeWhen($type == 'homeedit', 'admin.home-editor.index')
          @includeWhen($type == 'EditClient', 'admin.home-editor.client-page')
          @includeWhen($type == 'EditAward', 'admin.home-editor.awards-page')
          @includeWhen($type == 'Editnewsletter', 'admin.home-editor.newsletter-page')
       
          @includeWhen($type == 'Casestudies', 'casestudies.index')
          @includeWhen($type == 'casestudies_edit', 'casestudies.edit')
          @includeWhen($type == 'CasestudiesCreate', 'casestudies.create')
          @includeWhen($type == 'Slider', 'slider.index')
          @includeWhen($type == 'EditSlider', 'slider.edit')
          @includeWhen($type == 'Industries', 'industries.index')
          @includeWhen($type == 'industries_edit', 'industries.edit')
          @includeWhen($type == 'Testimonials', 'testimonial.index')
          @includeWhen($type == 'testimonial_create', 'testimonial.create')
          @includeWhen($type == 'newsletter_edit', 'newsletter.edit')
          @includeWhen($type == 'Testimonial_edit', 'testimonial.edit')
          @includeWhen($type == 'SocialMedia', 'setting.social-media')
          @includeWhen($type == 'Video_edit', 'video.edit')
          @includeWhen($type == 'Addvideo', 'video.create')

        @elseif(isset($sliders) && !empty($sliders))
          @includeWhen($type == 'Slider', 'admin.home-editor.slider-page')
        @endif
        
        @includeWhen($type == 'AddIndustries', 'industries.create')
        @includeWhen($type == 'CreateMainCategory', 'category.create')  

        @includeWhen($type == 'photo', 'photo.list-photo')
        @includeWhen($type == 'video', 'video.create')
        
      </div>
     
    </div>
  </div>
</div>
