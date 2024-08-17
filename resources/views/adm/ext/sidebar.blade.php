  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.index')}}" class="brand-link  text-center">
      <span class="brand-text font-weight-light text-strong text-uppercase" style="font-size:14px;">
        <img src="{{url('sardar')}}/img/{{getWebsiteOptions()['website_favicon']->option_value}}" width="24" alt="">
              Giant Industrial Inflatables</span>
    </a>

    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
          <li class="nav-item dashboard">
          
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item setting">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Global Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="{{route('admin.category.list')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{route('admin.setting.seo-manage')}}" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Logo Manage</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.setting.social-media')}}" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.customJs.create')}}" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Header & Footer JS</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('email-filter.index')}}" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Email Filter</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="{{route('admin.category.create')}}" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Mail Server</p>
                </a>
              </li> -->
<!-- 
              <li class="nav-item">
                <a href="{{route('admin.category.create')}}" class="nav-link">
                  <i class="fa fa-sitemap nav-icon"></i>
                  <p>Sitemap</p>
                </a>
              </li> -->

              
            </ul>
          </li>

          <li class="nav-item slider">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-columns"></i>
              <p>
                Sliders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item contact-inquiry">
              <a href="{{route('contactus.index')}}" class="nav-link">
                <i class="fa fa-address-card-o nav-icon"></i>
                <p>Enquiry</p>
              </a>
            </li>
            
          <li class="nav-item page">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Home Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.product-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Product Page</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.about-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>About Page</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.testimonial-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Testimonial Page</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.video-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Video Page</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.blog-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Blog Page</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.contact-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Contact Page</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.partners-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Partners Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.casestudies-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Casestudies Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.newsletter-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Newsletter Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.client-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Client Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.awards-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Awards Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.industries-page.editor')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Industries Page</p>
                </a>
              </li>
              
            </ul>
          </li>
          

          <li class="nav-item listing">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list-ol"></i>
              <p>
                Manage Listing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.category.create')}}?type=main_category" class="nav-link">
                
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.category.list')}}?type=main_category" class="nav-link">
                
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('admin.category.create')}}?type=sub_category" class="nav-link">
                
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.category.list')}}?type=sub_category" class="nav-link">
                
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Manage Sub Category</p>
                </a>
              </li>



<li class="nav-item">
  <a href="{{route('admin.photo.manage')}}?page=list" class="nav-link">
    <i class="fa fa-product-hunt nav-icon"></i>
    <p>Manage Photos
    </p>
  </a>
</li>


            </ul>
          </li>

          <li class="nav-item video">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-video-camera"></i>
              <p>
                Video
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{route('video.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="{{route('video.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>


            </ul>
          </li>
          

          <li class="nav-item testimonial">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p>
              Testimonials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="{{route('testimonials.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('testimonials.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item casestudies">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p>
              Case Studies
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="{{route('casestudies.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('casestudies.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item newsletter">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>
              News Letter
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="{{route('newsletter.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('newsletter.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item industries">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p>
              Industries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="{{url('powerup/industries-create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('powerup/industries-index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>
       

          <li class="nav-item block-control">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Block Control
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
            
              <!-- <li class="nav-item">
                <a href="{{route('admin.topInflatable.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>ALL INFLATABLES</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{route('client.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('award.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Awards</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item footer-url">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Footer Url
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.pageLink.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Page Links   <span class="pull-right">(B-1)</span></p>
                </a>
              </li>
              
              <!-- <li class="nav-item">
                <a href="{{route('admin.commonLink.create','category')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Category Links   <span class="pull-right">(B-2)</span></p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.commonLink.create','product')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Product Links   <span class="pull-right">(B-3)</span></p>
                </a>
              </li>
              
               
              <li class="nav-item">
                <a href="{{route('admin.commonLink.create','blog')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Blog Links   <span class="pull-right">(B-4)</span></p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.commonLink.create','testimonial')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Testimonial Links   <span class="pull-right">(B-5)</span></p>
                </a>
              </li>
             -->
            </ul>
          </li> 
        
          <li class="nav-item blog">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pencil-square-o"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('blog.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('blog.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item partners">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Partners
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('partners.create')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('partners.index')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

            </ul>
          </li>
          
          
          <!-- <li class="nav-item seo">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-google"></i>
              <p>
                Seo Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.category.list')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.category.list')}}" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li> -->
          
          
            <li class="nav-item">            
            <a href="{{route('admin.auth.logout')}}" class="nav-link bg-dark">
            
              <i class="nav-icon fa fa-lock "></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            </li>
            
          </ul>
          </nav>
      
    </div>
  </aside>