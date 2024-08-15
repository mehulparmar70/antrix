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
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CaseStudiesController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\HomeEditorController;


$adminRewrite = 'powerup';

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('powerup')->group(function () {


    
Route::post('/register/save', [AdminAuthController::class, 'save'])->name('admin.register.save');
Route::post('/auth/check', [AdminAuthController::class, 'check'])->name('admin.auth.check');

Route::get('/auth/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');
Route::get('/auth/logoutOnscreen', [AdminAuthController::class, 'logoutOnscreen'])->name('admin.auth.logoutOnscreen');

Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
Route::get('/register', [AdminAuthController::class, 'register']);


Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');

Route::delete('industries/{id}', [IndustriesController::class, 'destroy'])->name('industries.delete');


Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
Route::get('/category/create',[CategoryController::class, 'create'])->name('admin.category.create');

Route::get('/',[DashboardController::class, 'index'])->name('admin.index');

Route::get('clients', [ClientController::class, 'index'])->name('client.index');
Route::get('awards', [AwardController::class, 'index'])->name('award.index');
Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('casestudies', [CaseStudiesController::class, 'index'])->name('casestudies.index');
Route::get('casestudies/create', [CaseStudiesController::class, 'create'])->name('casestudies.create');
Route::get('casestudies/{id}/edit', [CaseStudiesController::class, 'edit'])->name('casestudies.edit');

Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');

Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::get('newsletter/create', [NewsletterController::class, 'create'])->name('newsletter.create');
Route::get('newsletter/{id}/edit', [NewsletterController::class, 'edit'])->name('newsletter.edit');
Route::get('/settings/social-media', [SettingController::class, 'socialMediaIndex'])->name('admin.setting.social-media');
Route::post('/settings/social-media', [SettingController::class, 'socialMediaStore'])->name('admin.setting.social-media.store');

Route::get('/category',[CategoryController::class, 'index'])->name('admin.category.list');
Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::get('videos/create', [VideoController::class, 'create'])->name('video.create');
Route::get('videos', [VideoController::class, 'index'])->name('video.index');
Route::get('blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('sliders', [SliderController::class, 'index'])->name('slider.index');


Route::get('/page-editor/about', [PageController::class, 'aboutPageEditor'])->name('admin.about-page.editor');
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
});