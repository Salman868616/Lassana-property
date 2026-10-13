<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::redirect('/index', '/', 301)->name('template-preview');
Route::get('home-real-estate', [\App\Http\Controllers\HomeController::class, 'index'])->name('home-real-estate');
Route::get(
    '/listings-real-estate',
    [\App\Http\Controllers\PropertyController::class, 'finderIndex']
)->name('listings-real-estate');
Route::redirect('single-entry-real-estate', '/properties', 301)->name('single-entry-real-estate');
Route::redirect('/vendor-real-estate', '/agents', 301)->name('vendor-real-estate');
Route::get('/agents', [\App\Http\Controllers\AgentProfileController::class, 'index'])->name('agents.index');
Route::get('/agents/{agent}', [\App\Http\Controllers\AgentProfileController::class, 'show'])->whereNumber('agent')->name('agents.show');
foreach (['type','location','photos','details','price','contact-info','promotion'] as $step) {
    Route::get('add-property-'.$step, [\App\Http\Controllers\LegacyAccountController::class, 'createProperty'])
        ->middleware('auth')->name('add-property-'.$step);
}
foreach (['type','location'] as $step) {
    Route::post('add-property-'.$step, [\App\Http\Controllers\LegacyAccountController::class, 'createProperty'])
        ->middleware('auth')->name('add-property-'.$step.'.store');
}

Route::middleware('guest')->group(function () {
    Route::view('/account-signin', 'account.auth.account-signin')
        ->name('account-signin');

    Route::view('/account-signup', 'account.auth.account-signup')
        ->name('account-signup');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('login.store');

    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:5,1')
        ->name('register.store');
});

Route::middleware('auth')->controller(\App\Http\Controllers\EmailVerificationController::class)->group(function () {
    Route::get('/verify-email', 'notice')->name('verification.notice');
    Route::post('/verify-email', 'verify')->middleware('throttle:10,1')->name('verification.verify');
    Route::post('/verify-email/resend', 'send')->middleware('throttle:5,1')->name('verification.send');
    Route::put('/verify-email/address', 'changeEmail')->middleware('throttle:5,1')->name('verification.email');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->controller(\App\Http\Controllers\PhoneVerificationController::class)->group(function () {
    Route::get('/verify-phone', 'notice')->name('phone-verification.notice');
    Route::post('/verify-phone', 'verify')->middleware('throttle:10,1')->name('phone-verification.verify');
    Route::post('/verify-phone/resend', 'send')->middleware('throttle:5,1')->name('phone-verification.send');
});



Route::middleware('guest')->controller(\App\Http\Controllers\PasswordResetController::class)->group(function () {
    Route::get('/account-password-recovery', 'request')->name('account-password-recovery');
    Route::post('/forgot-password', 'email')->middleware('throttle:5,1')->name('password.email');
    Route::get('/reset-password/{token}', 'edit')->name('password.reset');
    Route::post('/reset-password', 'update')->middleware('throttle:10,1')->name('password.update');
});
Route::get('/account-profile',[\App\Http\Controllers\AccountProfileController::class,'edit'])->middleware('auth')->name('account-profile');
Route::put('/account-profile',[\App\Http\Controllers\AccountProfileController::class,'update'])->middleware(['auth','throttle:20,1'])->name('account-profile.update');
Route::get('account-listings', [\App\Http\Controllers\LegacyAccountController::class, 'listings'])->middleware('auth')->name('account-listings');
Route::get('account-reviews', [\App\Http\Controllers\LegacyAccountController::class, 'account'])->middleware('auth')->name('account-reviews');
Route::get('account-favorites', [\App\Http\Controllers\LegacyAccountController::class, 'favorites'])->middleware('auth')->name('account-favorites');
Route::get('account-payment', [\App\Http\Controllers\LegacyAccountController::class, 'account'])->middleware('auth')->name('account-payment');
Route::get('account-settings', [\App\Http\Controllers\LegacyAccountController::class, 'account'])->middleware('auth')->name('account-settings');

// Homepage education, developer registration and customer testimonials.
Route::get('/guides',[\App\Http\Controllers\PropertyGuideController::class,'index'])->name('guides.index');
Route::get('/guides/{guide}',[\App\Http\Controllers\PropertyGuideController::class,'show'])->where('guide','[a-z0-9-]+')->name('guides.show');
Route::middleware('auth')->controller(\App\Http\Controllers\DeveloperApplicationController::class)->group(function () {
    Route::get('/account/developer-application','create')->name('account.developer-application');
    Route::post('/account/developer-application','store')->middleware('throttle:5,1')->name('account.developer-application.store');
});
Route::middleware(['auth','role:admin'])->prefix('admin/developer-applications')->name('admin.developer-applications.')->controller(\App\Http\Controllers\DeveloperApplicationController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/{application}','show')->whereNumber('application')->name('show');
    Route::post('/{application}/review','review')->whereNumber('application')->middleware('throttle:20,1')->name('review');
});
Route::middleware(['auth','role:admin'])->prefix('admin/testimonials')->name('admin.testimonials.')->controller(\App\Http\Controllers\Admin\TestimonialController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->middleware('throttle:20,1')->name('store');
    Route::get('/{testimonial}/edit','edit')->whereNumber('testimonial')->name('edit');
    Route::put('/{testimonial}','update')->whereNumber('testimonial')->middleware('throttle:20,1')->name('update');
});
// Public browse pages and service information.
foreach (['land'=>'land-for-sale','houses'=>'houses-for-sale','apartments-villas'=>'apartments-and-villas','commercial'=>'commercial-properties','verified'=>'verified-properties','all'=>'all-properties'] as $name=>$path) {
    Route::get('/'.$path, [\App\Http\Controllers\PropertyController::class,'index'])->name('properties.'.$name);
}
Route::view('/services','pages.services')->name('services.index');
Route::get('/services/{page}', [\App\Http\Controllers\PublicPageController::class,'service'])->where('page','sell-your-property|property-verification|property-inspection|overseas-property|build-your-home|house-plans|architectural-design|boq')->name('services.show');
Route::view('/faqs','pages.faqs')->name('faqs');
Route::get('/privacy-policy', [\App\Http\Controllers\PublicPageController::class,'legal'])->name('privacy-policy');
Route::get('/disclaimer', [\App\Http\Controllers\PublicPageController::class,'legal'])->name('disclaimer');
Route::get('/developers',[\App\Http\Controllers\DeveloperController::class,'index'])->name('developers.index');
Route::get('/developers/{developer}',[\App\Http\Controllers\DeveloperController::class,'show'])->whereNumber('developer')->name('developers.show');
Route::post('/language',[\App\Http\Controllers\LanguageController::class,'update'])->name('language.update');
Route::middleware(['auth','role:admin'])->prefix('admin/developers')->name('admin.developers.')->controller(\App\Http\Controllers\Admin\DeveloperController::class)->group(function () {
    Route::get('/','index')->name('index'); Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{developer}/edit','edit')->whereNumber('developer')->name('edit');
    Route::put('/{developer}','update')->whereNumber('developer')->name('update');
});

Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::view('/verification-ranks', 'pages.verification-ranks')->name('verification-ranks');
Route::view('/contact-us', 'pages.contact-us')->name('contact-us');
Route::redirect('/about', '/about-us', 301);
Route::redirect('/contact', '/contact-us', 301);
Route::redirect('about-v1', '/about-us', 301)->name('about-v1');
Route::redirect('about-v2', '/about-us', 301)->name('about-v2');
Route::redirect('blog-layout-v1', '/properties', 302)->name('blog-layout-v1');
Route::redirect('blog-single-v1', '/properties', 302)->name('blog-single-v1');
Route::redirect('contact-v1', '/contact-us', 301)->name('contact-v1');
Route::redirect('contact-v2', '/contact-us', 301)->name('contact-v2');
Route::redirect('contact-v3', '/contact-us', 301)->name('contact-v3');
Route::redirect('help-topics-v1', '/contact-us', 302)->name('help-topics-v1');
Route::redirect('help-single-article-v1', '/contact-us', 302)->name('help-single-article-v1');
Route::get('404-bg-image', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('404-bg-image');
Route::get('404-icon', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('404-icon');
Route::get('404-split-screen', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('404-split-screen');
Route::get('404-illustration', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('404-illustration');
Route::get('terms-and-conditions', [\App\Http\Controllers\PublicPageController::class,'legal'])->name('terms-and-conditions');
Route::get('docs/typography', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('typography');
Route::get('docs/installation', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('installation');
Route::get('docs/npm-scripts', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('npm-scripts');
Route::get('docs/structure', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('structure');
Route::get('docs/configuration', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('configuration');
Route::get('docs/pwa', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('pwa');
Route::get('docs/web-font', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('web-font');
Route::get('docs/icon-font', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('icon-font');
Route::get('docs/performance', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('performance');
Route::get('docs/browser-support', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('browser-support');
Route::get('docs/rtl', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('rtl');
Route::get('docs/deployment', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('deployment');
Route::get('docs/credits', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('credits');
Route::get('docs/changelog', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('changelog');
Route::get('docs/options', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('options');
Route::get('docs/colors', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('colors');
Route::get('docs/color-modes', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('color-modes');
Route::get('docs/css-variables', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('css-variables');
Route::get('docs/icons', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('icons');
Route::get('docs/code', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('code');
Route::get('docs/images', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('images');
Route::get('docs/tables', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('tables');
Route::get('docs/accordion', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('accordion');
Route::get('docs/alerts', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('alerts');
Route::get('docs/badges', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('badges');
Route::get('docs/blog-components', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('blog-components');
Route::get('docs/breadcrumb', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('breadcrumb');
Route::get('docs/buttons', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('buttons');
Route::get('docs/button-group', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('button-group');
Route::get('docs/card', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('card');
Route::get('docs/carousel', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('carousel');
Route::get('docs/categories', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('categories');
Route::get('docs/collapse', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('collapse');
Route::get('docs/countdown', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('countdown');
Route::get('docs/date-picker', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('date-picker');
Route::get('docs/dropdowns', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('dropdowns');
Route::get('docs/filter-widgets', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('filter-widgets');
Route::get('docs/forms', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('forms');
Route::get('docs/image-comparison-slider', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('image-comparison-slider');
Route::get('docs/input-group', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('input-group');
Route::get('docs/input-formatter', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('input-formatter');
Route::get('docs/lightbox', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('lightbox');
Route::get('docs/list-group', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('list-group');
Route::get('docs/listing-cards', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('listing-cards');
Route::get('docs/map', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('map');
Route::get('docs/modal', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('modal');
Route::get('docs/nav-links', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('nav-links');
Route::get('docs/navbar', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('navbar');
Route::get('docs/offcanvas', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('offcanvas');
Route::get('docs/pagination', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('pagination');
Route::get('docs/pills', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('pills');
Route::get('docs/placeholders', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('placeholders');
Route::get('docs/popovers', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('popovers');
Route::get('docs/pricing', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('pricing');
Route::get('docs/progress', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('progress');
Route::get('docs/reviews', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('reviews');
Route::get('docs/scrollbar', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('scrollbar');
Route::get('docs/scrollspy', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('scrollspy');
Route::get('docs/select-box', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('select-box');
Route::get('docs/spinners', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('spinners');
Route::get('docs/tabs', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('tabs');
Route::get('docs/toasts', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('toasts');
Route::get('docs/tooltips', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('tooltips');
Route::get('docs/utilities', [\App\Http\Controllers\RetiredTemplateController::class, 'show'])->name('utilities');
Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');
    Route::get(
    '/admin/properties',
    [\App\Http\Controllers\Admin\PropertyController::class, 'index']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.index');
    Route::get(
    '/admin/properties/create',
    [\App\Http\Controllers\Admin\PropertyController::class, 'create']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.create');

Route::post(
    '/admin/properties',
    [\App\Http\Controllers\Admin\PropertyController::class, 'store']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.store');

    Route::get(
    '/admin/properties/{property}/edit',
    [\App\Http\Controllers\Admin\PropertyController::class, 'edit']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.edit');

Route::put(
    '/admin/properties/{property}',
    [\App\Http\Controllers\Admin\PropertyController::class, 'update']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.update');
    Route::delete(
    '/admin/properties/{property}/images/{image}',
    [\App\Http\Controllers\Admin\PropertyController::class, 'destroyImage']
)->middleware(['auth', 'role:admin'])
    ->whereNumber('image')
    ->name('admin.properties.images.destroy');
    Route::post(
    '/admin/properties/{property}/submit',
    [\App\Http\Controllers\Admin\PropertyController::class, 'submit']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.submit');
    Route::post(
    '/admin/properties/{property}/start-review',
    [\App\Http\Controllers\Admin\PropertyController::class, 'startReview']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.start-review');
    Route::post(
    '/admin/properties/{property}/approve',
    [\App\Http\Controllers\Admin\PropertyController::class, 'approve']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.approve');

Route::post(
    '/admin/properties/{property}/return-to-draft',
    [\App\Http\Controllers\Admin\PropertyController::class, 'returnToDraft']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.return-to-draft');
    Route::post(
    '/admin/properties/{property}/publish',
    [\App\Http\Controllers\Admin\PropertyController::class, 'publish']
)->middleware(['auth', 'role:admin'])
    ->name('admin.properties.publish');

Route::patch('/admin/properties/{property}/featured',
    [\App\Http\Controllers\Admin\FeaturedPropertyController::class, 'update'])
    ->middleware(['auth', 'role:admin'])->whereNumber('property')
    ->name('admin.properties.featured');

Route::post('/admin/properties/{property}/archive',
    [\App\Http\Controllers\Admin\PropertyController::class, 'archive'])
    ->middleware(['auth', 'role:admin'])->whereNumber('property')
    ->name('admin.properties.archive');

Route::post('/admin/properties/{property}/mark-sold',
    [\App\Http\Controllers\Admin\PropertyController::class, 'markSold'])
    ->middleware(['auth', 'role:admin'])->whereNumber('property')
    ->name('admin.properties.mark-sold');
    Route::get(
    '/properties',
    [\App\Http\Controllers\PropertyController::class, 'index']
)->name('properties.index');

Route::get('/properties-for-rent', [\App\Http\Controllers\PropertyController::class, 'index'])
    ->name('properties.rent');

Route::get(
    '/properties/{propertyCode}',
    [\App\Http\Controllers\PropertyController::class, 'show']
)->name('properties.show');
Route::post(
    '/properties/{property}/enquiries',
    [\App\Http\Controllers\PropertyEnquiryController::class, 'store']
)->name('properties.enquiries.store');
Route::get(
    '/properties-map.json',
    [\App\Http\Controllers\PropertyController::class, 'mapMarkers']
)->name('properties.map');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{role}', [\App\Http\Controllers\DashboardController::class, 'show'])
        ->whereIn('role', ['admin', 'seller', 'agent', 'sales', 'verification', 'buyer'])
        ->name('dashboard.role');
    Route::get('/dashboard/{role}/properties/{property}', [\App\Http\Controllers\DashboardController::class, 'property'])
        ->whereIn('role', ['admin', 'seller', 'agent', 'sales', 'verification', 'buyer'])
        ->whereNumber('property')->name('dashboard.property');
});

Route::middleware(['auth', 'role:seller'])->prefix('seller/properties')->name('seller.properties.')->group(function () {
    Route::get('/create', [\App\Http\Controllers\SellerPropertyController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\SellerPropertyController::class, 'store'])->name('store');
    Route::get('/{property}/edit', [\App\Http\Controllers\SellerPropertyController::class, 'edit'])->whereNumber('property')->name('edit');
    Route::put('/{property}', [\App\Http\Controllers\SellerPropertyController::class, 'update'])->whereNumber('property')->name('update');
    Route::post('/{property}/submit', [\App\Http\Controllers\SellerPropertyController::class, 'submit'])->whereNumber('property')->name('submit');
});

Route::middleware(['auth', 'role:verification,admin'])->prefix('verification/properties')->name('verification.properties.')->group(function () {
    Route::post('/{property}/approve', [\App\Http\Controllers\VerificationController::class, 'approve'])->whereNumber('property')->name('approve');
    Route::post('/{property}/silver', [\App\Http\Controllers\VerificationController::class, 'silver'])->whereNumber('property')->name('silver');
    Route::post('/{property}/reject', [\App\Http\Controllers\VerificationController::class, 'reject'])->whereNumber('property')->name('reject');
});
Route::post('/seller/properties/{property}/documents', [\App\Http\Controllers\PropertyDocumentController::class, 'store'])
    ->middleware(['auth', 'role:seller'])->whereNumber('property')->name('seller.documents.store');
Route::get('/dashboard/{role}/properties/{property}/documents/{document}/download', [\App\Http\Controllers\PropertyDocumentController::class, 'download'])
    ->middleware('auth')->whereIn('role', ['seller','agent','admin','verification'])->whereNumber('property')->whereNumber('document')->name('property-documents.download');
Route::post('/dashboard/{role}/properties/{property}/documents/{document}/review', [\App\Http\Controllers\PropertyDocumentController::class, 'review'])
    ->middleware('auth')->whereIn('role', ['admin','verification'])->whereNumber('property')->whereNumber('document')->name('property-documents.review');

Route::middleware('auth')->prefix('dashboard/{role}')->where(['role' => 'admin|sales|agent'])->group(function () {
    Route::get('/leads/{lead}', [\App\Http\Controllers\LeadController::class,'show'])->whereNumber('lead')->name('leads.show');
    Route::post('/enquiries/{enquiry}/lead', [\App\Http\Controllers\LeadController::class,'convert'])->whereNumber('enquiry')->name('leads.convert');
    Route::post('/leads/{lead}/assign', [\App\Http\Controllers\LeadController::class,'assign'])->whereNumber('lead')->name('leads.assign');
    Route::post('/leads/{lead}/follow-up', [\App\Http\Controllers\LeadController::class,'update'])->whereNumber('lead')->name('leads.update');
    Route::post('/leads/{lead}/viewings', [\App\Http\Controllers\LeadController::class,'schedule'])->whereNumber('lead')->name('leads.schedule');
    Route::post('/leads/{lead}/viewings/{viewing}/outcome', [\App\Http\Controllers\LeadController::class,'viewingOutcome'])->whereNumber('lead')->whereNumber('viewing')->name('leads.viewing-outcome');
});


Route::middleware(['auth','role:admin'])->prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\UserManagementController::class,'index'])->name('index');
    Route::get('/{user}/edit', [\App\Http\Controllers\Admin\UserManagementController::class,'edit'])->whereNumber('user')->name('edit');
    Route::put('/{user}', [\App\Http\Controllers\Admin\UserManagementController::class,'update'])->whereNumber('user')->name('update');
});

Route::middleware(['auth','role:buyer'])->prefix('buyer/property-requests')->name('buyer.requests.')->group(function () {
    Route::get('/create',[\App\Http\Controllers\PropertyRequestController::class,'create'])->name('create');
    Route::post('/',[\App\Http\Controllers\PropertyRequestController::class,'store'])->middleware('throttle:10,1')->name('store');
    Route::get('/{propertyRequest}',[\App\Http\Controllers\PropertyRequestController::class,'show'])->whereNumber('propertyRequest')->name('show');
});
Route::post('/dashboard/{role}/leads/{lead}/match-property',[\App\Http\Controllers\LeadController::class,'matchProperty'])
    ->middleware('auth')->whereIn('role',['admin','sales','agent'])->whereNumber('lead')->name('leads.match-property');
Route::middleware(['auth','role:buyer'])->prefix('buyer/saved-properties')->name('buyer.saved.')->group(function () {
    Route::post('/{property}',[\App\Http\Controllers\SavedPropertyController::class,'store'])->whereNumber('property')->name('store');
    Route::delete('/{property}',[\App\Http\Controllers\SavedPropertyController::class,'destroy'])->whereNumber('property')->name('destroy');
});
Route::post('/dashboard/{role}/properties/{property}/videos', [\App\Http\Controllers\PropertyVideoController::class, 'update'])
    ->middleware('auth')->whereIn('role', ['admin','seller','agent'])->whereNumber('property')->name('property-videos.update');
Route::get('/property-videos/{property}', [\App\Http\Controllers\PropertyVideoController::class, 'show'])
    ->whereNumber('property')->name('property-videos.show');

Route::middleware(['auth', 'role:admin'])->prefix('admin/reports')->name('admin.reports.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('index');
    Route::get('/download', [\App\Http\Controllers\Admin\ReportController::class, 'download'])->name('download');
});
Route::post('/admin/properties/{property}/unpublish', [\App\Http\Controllers\Admin\PropertyController::class, 'unpublish'])
    ->middleware(['auth', 'role:admin'])->whereNumber('property')->name('admin.properties.unpublish');

Route::middleware(['auth', 'role:buyer'])->prefix('buyer/service-requests')->name('buyer.services.')->group(function () {
    Route::get('/', [\App\Http\Controllers\BuyerServiceRequestController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\BuyerServiceRequestController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\BuyerServiceRequestController::class, 'store'])->middleware('throttle:10,1')->name('store');
    Route::get('/{serviceRequest}', [\App\Http\Controllers\BuyerServiceRequestController::class, 'show'])->whereNumber('serviceRequest')->name('show');
});

Route::middleware(['auth', 'role:agent'])->prefix('agent/properties')->name('agent.properties.')->group(function () {
    Route::get('/create', [\App\Http\Controllers\AgentPropertyController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\AgentPropertyController::class, 'store'])->name('store');
    Route::get('/{property}/edit', [\App\Http\Controllers\AgentPropertyController::class, 'edit'])->whereNumber('property')->name('edit');
    Route::put('/{property}', [\App\Http\Controllers\AgentPropertyController::class, 'update'])->whereNumber('property')->name('update');
    Route::post('/{property}/submit', [\App\Http\Controllers\AgentPropertyController::class, 'submit'])->whereNumber('property')->name('submit');
});
Route::post('/agent/properties/{property}/documents', [\App\Http\Controllers\PropertyDocumentController::class, 'store'])
    ->middleware(['auth', 'role:agent'])->whereNumber('property')->name('agent.documents.store');

Route::middleware(['auth','role:admin'])->prefix('admin/revenue')->name('admin.revenue.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\RevenueController::class, 'index'])->name('index');
    Route::get('/download', [\App\Http\Controllers\Admin\RevenueController::class, 'download'])->name('download');
    Route::post('/', [\App\Http\Controllers\Admin\RevenueController::class, 'store'])->name('store');
    Route::post('/{payment}/void', [\App\Http\Controllers\Admin\RevenueController::class, 'void'])->whereNumber('payment')->name('void');
});

Route::middleware('auth')->controller(\App\Http\Controllers\AccountOnboardingController::class)->group(function () {
    Route::post('/account/seller-access','seller')->middleware('throttle:5,1')->name('account.seller-access');
    Route::get('/account/agent-application','create')->name('account.agent-application');
    Route::post('/account/agent-application','store')->middleware('throttle:5,1')->name('account.agent-application.store');
});
Route::middleware(['auth','role:admin'])->prefix('admin/agent-applications')->name('admin.agent-applications.')
    ->controller(\App\Http\Controllers\AccountOnboardingController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/{application}','show')->whereNumber('application')->name('show');
        Route::post('/{application}/review','review')->whereNumber('application')->middleware('throttle:20,1')->name('review');
    });

Route::middleware('auth')->prefix('account/complaints')->name('complaints.')->controller(\App\Http\Controllers\ComplaintController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->middleware('throttle:5,1')->name('store');
    Route::get('/{complaint}','show')->whereNumber('complaint')->name('show');
});
Route::middleware(['auth','role:admin'])->prefix('admin/complaints')->name('admin.complaints.')->controller(\App\Http\Controllers\ComplaintController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/{complaint}','show')->whereNumber('complaint')->name('show');
    Route::put('/{complaint}','update')->whereNumber('complaint')->middleware('throttle:20,1')->name('update');
});

Route::middleware(['auth','role:admin'])->prefix('admin/marketing')->name('admin.marketing.')
    ->controller(\App\Http\Controllers\Admin\MarketingController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::post('/','store')->middleware('throttle:20,1')->name('store');
        Route::get('/{campaign}','show')->whereNumber('campaign')->name('show');
        Route::put('/{campaign}','update')->whereNumber('campaign')->name('update');
        Route::post('/{campaign}/spending','spend')->whereNumber('campaign')->middleware('throttle:20,1')->name('spend');
        Route::post('/{campaign}/spending/{spend}/void','void')->whereNumber('campaign')->whereNumber('spend')->name('void');
    });
