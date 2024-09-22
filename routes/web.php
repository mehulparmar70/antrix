<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\AwardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudiesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\HomeEditorController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CustomCodeController;


$adminRewrite = 'powerup';

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('custom-industrial-inflatable-products', [HomeController::class, 'product'])->name('products');
Route::get('/about', [HomeController::class, 'about'])->name('admin');
Route::get('client', [HomeController::class, 'client']);
Route::get('videos', [HomeController::class, 'videos']);
Route::get('awards', [HomeController::class, 'awards']);
Route::get('news-letters', [HomeController::class, 'newsletters']);
Route::get('news-letters/{slug}', [HomeController::class, 'newsletters_details']);
Route::get('partenrs', [HomeController::class, 'partenrs']);
Route::get('case-studies', [HomeController::class, 'casestudies']);
Route::get('testimonials', [HomeController::class, 'testimonials']);

Route::get('updates', [HomeController::class, 'updates']);
Route::get('updates/{slug}', [HomeController::class, 'updates_details']);
Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');


Route::prefix('powerup')->group(function () {


    
Route::post('/register/save', [AdminAuthController::class, 'save'])->name('admin.register.save');
Route::post('/auth/check', [AdminAuthController::class, 'check'])->name('admin.auth.check');

Route::get('/auth/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');
Route::get('/auth/logoutOnscreen', [AdminAuthController::class, 'logoutOnscreen'])->name('admin.auth.logoutOnscreen');

Route::get('/', [AdminAuthController::class, 'login'])->name('login');
Route::get('/register', [AdminAuthController::class, 'register']);


Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('slider/{id}', [SliderController::class, 'update'])->name('slider.update');

Route::post('industries/delete/{id}', [IndustriesController::class, 'destroy'])->name('industries.delete');


Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
Route::get('/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/category/store',[CategoryController::class, 'store'])->name('admin.category.store');
Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
Route::post('dashboard/category/delete/{id}',[CategoryController::class, 'destroy'])->name('admin.category.delete');


// Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.index');
Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.index');

Route::get('clients', [ClientController::class, 'index'])->name('client.index');
Route::get('awards', [AwardController::class, 'index'])->name('award.index');
Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('casestudies', [CaseStudiesController::class, 'index'])->name('casestudies.index');
Route::get('casestudies/create', [CaseStudiesController::class, 'create'])->name('casestudies.create');
Route::get('casestudies/{id}/edit', [CaseStudiesController::class, 'edit'])->name('casestudies.edit');
Route::put('/casestudies/{id}', [CaseStudiesController::class, 'update'])->name('casestudies.update');
Route::post('/casestudies/store', [CaseStudiesController::class, 'store'])->name('casestudies.store');


Route::get('case-studies', [HomeController::class, 'casestudies']);
Route::get('case-studies/{slug}', [HomeController::class, 'casestudies_details']);
Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::put('testimonials/update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::post('testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::post('testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.delete');

Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::get('newsletter/create', [NewsletterController::class, 'create'])->name('newsletter.create');
Route::post('newsletter/store', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::put('newsletter/update/{id}', [NewsletterController::class, 'update'])->name('newsletter.update');
Route::get('newsletter/{id}/edit', [NewsletterController::class, 'edit'])->name('newsletter.edit');
Route::post('newsletter/delete/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.delete');


Route::get('/category',[CategoryController::class, 'index'])->name('admin.category.list');
Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::get('videos/create', [VideoController::class, 'create'])->name('video.create');
Route::get('videos', [VideoController::class, 'index'])->name('video.index');
Route::get('blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::post('blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

Route::get('sliders', [SliderController::class, 'index'])->name('slider.index');
Route::get('listview', [SliderController::class, 'listview'])->name('slider.listview');
Route::post('update-sliders', [SliderController::class, 'update_list_no'])->name('slider.update');
Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::post('slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');



Route::get('page-editor/about', [PageController::class, 'aboutPageEditor'])->name('admin.about-page.editor');
Route::get('/page-editor/product', [PageController::class, 'productPageEditor'])->name('admin.product-page.editor');
Route::get('/page-editor/testimonial', [PageController::class, 'testimonialPageEditor'])->name('admin.testimonial-page.editor');
Route::get('/page-editor/video', [PageController::class, 'videoPageEditor'])->name('admin.video-page.editor');
Route::get('/page-editor/blog', [PageController::class, 'blogPageEditor'])->name('admin.blog-page.editor');
Route::get('/page-editor/partenrs', [PageController::class, 'partenrsPageEditor'])->name('admin.partners-page.editor');
Route::get('/page-editor/contact', [PageController::class, 'contactPageEditor'])->name('admin.contact-page.editor');
Route::get('/page-editor/casestudies', [PageController::class, 'casestudiesPageEditor'])->name('admin.casestudies-page.editor');
Route::get('/page-editor/newsletter', [PageController::class, 'newsletterPageEditor'])->name('admin.newsletter-page.editor');
Route::get('/page-editor/client', [PageController::class, 'clientPageEditor'])->name('admin.client-page.editor');
Route::get('/page-editor/awards', [PageController::class, 'awardsPageEditor'])->name('admin.awards-page.editor');
Route::get('/page-editor/updates', [PageController::class, 'updatesPageEditor'])->name('admin.updates-page.editor');
Route::get('/page-editor/industries', [PageController::class, 'industriePageEditor'])->name('admin.industries-page.editor');

Route::get('/home-editor', [HomeEditorController::class, 'homeEditorIndex'])->name('admin.home.editor');
Route::get('industries-create', [IndustriesController::class,'create'])->name('industries-create');
Route::post('industries-store', [IndustriesController::class,'store'])->name('industries-store');
Route::post('industries-update/{id}', [IndustriesController::class,'update'])->name('industries.update');;
Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('products/create', [ProductController::class, 'create'])->name('product.create');



Route::get('/settings/seo-manage', [SettingController::class, 'seoManageIndex'])->name('admin.setting.seo-manage');
Route::post('/settings/seo-manage', [SettingController::class, 'seoManageStore'])->name('admin.setting.seo-manage.store');
Route::post('/settings/seo-manage-image', [SettingController::class, 'seoManageImageStore'])->name('admin.setting.seo-manage-images.store');


Route::get('/custom-code/js',[CustomCodeController::class, 'customJs'])->name('admin.customJs.create');
Route::get('thankyou', [HomeController::class, 'thankyou'])->name('thankyou');
Route::post('/admin/page-editor/store', [PageController::class, 'pageEditorStore'])->name('admin.page-editor.store');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::get('/setting/social-media', [SettingController::class, 'socialMedia'])->name('setting.social-media');
Route::get('/admin/custom-code/js',[CustomCodeController::class, 'customJs'])->name('customJs.create');

Route::get('/admin/home-editor', [HomeEditorController::class, 'homeEditorIndex'])->name('home.editor');
Route::post('/admin/update-status',[StatusController::class, 'updateStatus'])->name('status.update');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::put('client/{id}', [ClientController::class, 'update'])->name('client.update');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');

Route::post('/award/delete/{id}', [AwardController::class, 'destroy'])->name('award.delete');
Route::get('/award/{id}/edit', [AwardController::class, 'edit'])->name('award.edit');
Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
Route::put('/video/update/{id}', [VideoController::class, 'update'])->name('video.update');
Route::get('/partners/{id}/edit', [PartnersController::class, 'edit'])->name('partners.edit');
Route::get('/partners/index', [PartnersController::class, 'index'])->name('partners.index');
Route::get('/partners/create', [PartnersController::class, 'create'])->name('partners.create');
Route::post('/partners/store', [PartnersController::class, 'store'])->name('partners.store');
Route::put('/partners/update/{id}', [PartnersController::class, 'update'])->name('partners.update');

Route::post('/admin/casestudies/item/delete/{id}', [CaseStudiesController::class, 'destroy'])->name('admin.casestudies.item.delete');
Route::post('/award/store', [AwardController::class, 'store'])->name('award.store');
Route::put('/award/{id}', [AwardController::class, 'update'])->name('award.update');


Route::post('/admin/item-bulk-delete',[ItemPriorityController::class, 'ItemBulkDelete'])->name('item.bulk-delete');
Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');


Route::get('/industries-index', [IndustriesController::class,'index'])->name('industries.index');
Route::get('/industries-create', [IndustriesController::class,'create'])->name('industries.create');
Route::get('/industries-edit/{id}', [IndustriesController::class,'edit'])->name('industries.edit');

Route::get('/settings/social-media', [SettingController::class, 'socialMediaIndex'])->name('setting.social-media');
Route::post('/settings/social-media', [SettingController::class, 'socialMediaStore'])->name('setting.social-media.store');
});

