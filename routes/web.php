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
use App\Http\Controllers\admin\CustomCodeController;
use App\Http\Controllers\admin\EmailFilterController;


$adminRewrite = 'powerup';

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('/index', [HomeController::class, 'index'])->name('index');
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

Route::get('/admin',[DashboardController::class, 'index'])->name('admin.index');

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

Route::prefix('powerup')->middleware(['web', 'AuthCheck'])->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
});

// Route::group(['middleware'=> ['AuthCheck']], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin.index');
    Route::get('/video/delete/{id}', [VideoController::class, 'deleteItem'])->name('admin.video.item.delete');
// });

Route::prefix('powerup')->name('product.')->middleware(['web', 'AuthCheck'])->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('create');
    Route::post('/product', [ProductController::class, 'store'])->name('store');
});

Route::prefix('powerup/settings')->name('admin.setting.')->middleware(['web', 'AuthCheck'])->group(function () {
    Route::get('/seo-manage', [SettingController::class, 'seoManage'])->name('seo-manage');
    Route::post('/seo-manage', [SettingController::class, 'storeSeoManage'])->name('seo-manage.store');
    Route::post('/seo-manage-image', [SettingController::class, 'storeSeoManageImages'])->name('seo-manage-images.store');
});

Route::prefix('powerup/custom-code')->name('admin.customJs.')->middleware(['web', 'AuthCheck'])->group(function () {
    Route::get('/js', [CustomCodeController::class, 'create'])->name('create');
});
Route::prefix('powerup')->middleware(['web', 'AuthCheck'])->group(function () {
    Route::get('email-filter', [EmailFilterController::class, 'index'])->name('email-filter.index');
    Route::get('email-filter/create', [EmailFilterController::class, 'create'])->name('email-filter.create');
    Route::post('email-filter', [EmailFilterController::class, 'store'])->name('email-filter.store');
    Route::get('email-filter/{email_filter}', [EmailFilterController::class, 'show'])->name('email-filter.show');
    Route::get('email-filter/{email_filter}/edit', [EmailFilterController::class, 'edit'])->name('email-filter.edit');
    Route::put('email-filter/{email_filter}', [EmailFilterController::class, 'update'])->name('email-filter.update');
    Route::delete('email-filter/{email_filter}', [EmailFilterController::class, 'destroy'])->name('email-filter.destroy');
});

Route::middleware(['web', 'AuthCheck'])
    ->prefix('powerup/admin')
    ->group(function () {
        Route::get('contactus', [App\Http\Controllers\admin\ContactusController::class, 'index'])->name('contactus.index');
        Route::get('contactus/create', [App\Http\Controllers\admin\ContactusController::class, 'create'])->name('contactus.create');
        Route::post('contactus', [App\Http\Controllers\admin\ContactusController::class, 'store'])->name('contactus.store');
        Route::get('contactus/{contactu}', [App\Http\Controllers\admin\ContactusController::class, 'show'])->name('contactus.show');
        Route::get('contactus/{contactu}/edit', [App\Http\Controllers\admin\ContactusController::class, 'edit'])->name('contactus.edit');
        Route::match(['put', 'patch'], 'contactus/{contactu}', [App\Http\Controllers\admin\ContactusController::class, 'update'])->name('contactus.update');
        Route::delete('contactus/{contactu}', [App\Http\Controllers\admin\ContactusController::class, 'destroy'])->name('contactus.destroy');
    });

    Route::middleware(['web', 'AuthCheck'])
    ->prefix('powerup')
    ->group(function () {
        Route::get('photo', [App\Http\Controllers\admin\PhotoManageController::class, 'index'])
            ->name('admin.photo.manage');
    });

    Route::middleware(['web', 'AuthCheck'])
    ->prefix('powerup/block-control')
    ->group(function () {
        Route::get('top-inflatables', [App\Http\Controllers\admin\BlockControlController::class, 'topInflatableCreate'])
            ->name('admin.topInflatable.create');
        Route::post('top-inflatables', [App\Http\Controllers\admin\BlockControlController::class, 'topInflatableStore'])
            ->name('admin.topInflatable.store');
    });

    Route::middleware(['web', 'AuthCheck'])
    ->prefix('powerup')
    ->group(function () {
        Route::get('block-control/page-links', [App\Http\Controllers\admin\BlockControlController::class, 'pageLinkCreate'])
            ->name('admin.pageLink.create');
        Route::post('block-control/page-links', [App\Http\Controllers\admin\BlockControlController::class, 'pageLinkStore'])
            ->name('admin.pageLink.store');
        Route::post('block-control/page-links/update', [App\Http\Controllers\admin\BlockControlController::class, 'pageLinkUpdate'])
            ->name('admin.pageLink.update');
        Route::get('block-control/common-links/{pageType}', [App\Http\Controllers\admin\BlockControlController::class, 'commonLinkCreate'])
            ->name('admin.commonLink.create');
        Route::post('block-control/common-links', [App\Http\Controllers\admin\BlockControlController::class, 'commonLinkStore'])
            ->name('admin.commonLink.store');
        Route::post('block-control/common-links/update', [App\Http\Controllers\admin\BlockControlController::class, 'commonLinkUpdate'])
            ->name('admin.commonLink.update');
    });

    Route::middleware(['web', 'AuthCheck'])
    ->prefix('powerup')
    ->group(function () {
        Route::get('partners', [App\Http\Controllers\admin\PartnersController::class, 'index'])
        ->name('partners.index');
        Route::get('partners/create', [App\Http\Controllers\admin\PartnersController::class, 'create'])
            ->name('partners.create');
        Route::post('partners', [App\Http\Controllers\admin\PartnersController::class, 'store'])
            ->name('partners.store');
        Route::get('partners/{partner}', [App\Http\Controllers\admin\PartnersController::class, 'show'])
            ->name('partners.show');
        Route::get('partners/{partner}/edit', [App\Http\Controllers\admin\PartnersController::class, 'edit'])
            ->name('partners.edit');
        Route::match(['put', 'patch'], 'partners/{partner}', [App\Http\Controllers\admin\PartnersController::class, 'update'])
            ->name('partners.update');
        Route::delete('partners/{partner}', [App\Http\Controllers\admin\PartnersController::class, 'destroy'])
            ->name('partners.destroy');
    });

    Route::middleware(['web'])
    ->prefix('powerup')
    ->group(function () {
        Route::get('login', [App\Http\Controllers\admin\AdminAuthController::class, 'login'])
            ->name('admin.login');
    });