<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AbilityController;
use App\Http\Controllers\Admin\BannerImageController;
use App\Http\Controllers\Admin\FestContoller;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\MPDController;
use App\Http\Controllers\LatestNewsAnnouncementsController;
use App\Http\Controllers\TranserCertificateController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\MarqueesController;
use App\Http\Controllers\Admin\SocialContactController;
use App\Http\Controllers\Admin\PrinciapalDeskController;
use App\Http\Controllers\Admin\FullCalenderController;
use App\Http\Controllers\Admin\AdmissionProcedureController;
use App\Http\Controllers\Admin\SyllabusController;
use App\Http\Controllers\Admin\FeeStructureController;
use App\Http\Controllers\Admin\AchieversDataController;
use App\Http\Controllers\Admin\ScoutGuideController;
use App\Http\Controllers\Admin\SportImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChairmanDeskController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\Notifications;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SchoolOverViewController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Frontend\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');

    return 'Cache is cleared';
});

Route::get('/', [IndexController::class, 'index'])->name('home');
// {
//     return view('frontend.index');
// })->name('home');
Route::get('/about-school', [HomeController::class, 'aboutschool'])->name('aboutschool');
Route::get('/vision&mission', [HomeController::class, 'visionmission'])->name('visionmission');
Route::get('/why-vis', [HomeController::class, 'whyvis'])->name('why-vis');
Route::get('/chairmandesk', [HomeController::class, 'chairmandesk'])->name('chairmandesk');
Route::get('/principaldesk', [HomeController::class, 'principaldesk'])->name('principaldesk');
Route::get('/teachingmethodolgy', [HomeController::class, 'teachingmethodolgy'])->name('teachingmethodolgy');
Route::get('/syllabus', [HomeController::class, 'syllabus'])->name('syllabus');
Route::get('/curriculum', [HomeController::class, 'curriculum'])->name('curriculum');
Route::get('/sport', [HomeController::class, 'sport'])->name('sport');
Route::get('/art-craft', [HomeController::class, 'artcraft'])->name('art-craft');
Route::get('/music-dance', [HomeController::class, 'musicdance'])->name('music-dance');
Route::get('/house-system', [HomeController::class, 'housesystem'])->name('house-system');
Route::get('/club', [HomeController::class, 'club'])->name('club');
Route::get('/infrastructure', [HomeController::class, 'infrastructure'])->name('infrastructure');
Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');
Route::get('/mpd', [HomeController::class, 'mpd'])->name('mpd');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::post('/contactus-email', [HomeController::class, 'contactusemail'])->name('contactusemail');
Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::get('/transfercertificate', [HomeController::class, 'transfercertificate'])->name('transfercertificate');
Route::post('/get-image', [HomeController::class, 'getImage'])->name('get-image');
Route::get('/activites', [HomeController::class, 'activites'])->name('activites');
Route::get('/holidays', [HomeController::class, 'holidays'])->name('holidays');
Route::get('/newsannouncements', [HomeController::class, 'newsannouncements'])->name('newsannouncements');
Route::get('/admission', [HomeController::class, 'admission'])->name('admission');
Route::get('/schooltour', [HomeController::class, 'schooltour'])->name('schooltour');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/achievers', [HomeController::class, 'achievers'])->name('achievers');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar');
Route::get('/scout-&-guide', [HomeController::class, 'scoutguide'])->name('scoutguide');


Route::get('/admin/auth', function () {
    return view('admin.auth');
});


Route::get('/user/auth', 'Admin\UserAuthController@login_view')->name('login');

Route::get('qr-code-for-return/{id}', [QrcodeController::class, 'qrCodeReturn'])->name('admin.qr-code.return');

Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::get('/logout', [UserAuthController::class, 'logout']);
    Route::get('/forgot/password', [UserAuthController::class, 'showForgotForm'])->name('forgot.password');
    Route::post('/forgot/password', [UserAuthController::class, 'sendResetLink'])->name('reset.password.link');
    Route::get('/reset/password/{token}', [UserAuthController::class, 'showResetForm'])->name('reset.password.form');
    Route::post('/reset/password', [UserAuthController::class, 'resetPassword'])->name('reset.password');

    Route::group(['middleware' => ['authenticate.user', 'authorise.user']], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        Route::post('/get_employee_total', [DashboardController::class, 'get_employeedata']);
        Route::delete('/email/delete/{id}', [DashboardController::class, 'delete_emails']);

        Route::get('/abilities', [AbilityController::class, 'abilities']);
        Route::get('/create_ability', [AbilityController::class, 'create_ability']);
        Route::post('/store_ability', [AbilityController::class, 'store_ability']);
        Route::get('/edit_ability/{id}', [AbilityController::class, 'edit_ability']);
        Route::post('/update_ability', [AbilityController::class, 'update_ability']);

        Route::get('/roles', [RoleController::class, 'roles']);
        Route::get('/create_role', [RoleController::class, 'create_role']);
        Route::post('/store_role', [RoleController::class, 'store_role']);
        Route::get('/edit_role/{id}', [RoleController::class, 'edit_role']);
        Route::post('/update_role', [RoleController::class, 'update_role']);
        Route::post('/change_role_status', [RoleController::class, 'change_role_status']);


        // Festival Routes
        Route::get('/festivals', [FestContoller::class, 'festivals_list'])->name('festivals_list');
        Route::get('/festivals/create', [FestContoller::class, 'create_festivals']);
        Route::post('/festivals/store', [FestContoller::class, 'store_festivals']);
        Route::get('/festivals/edit/{id}', [FestContoller::class, 'edit_festivals']);
        Route::post('/festivals/update', [FestContoller::class, 'update_festivals']);
        Route::delete('/festivals/delete/{id}', [FestContoller::class, 'delete_festivals']);
        Route::post('/festivals/year', [FestContoller::class, 'create_year'])->name('create_year');


        // Banner Routes
        Route::get('/banner', [BannerImageController::class, 'banner_list'])->name('banner.list');
        Route::get('/banner/create', [BannerImageController::class, 'create_banner'])->name('banner.create');
        Route::post('/banner/store', [BannerImageController::class, 'store_banner'])->name('banner.store');
        Route::delete('/banner/delete/{id}', [BannerImageController::class, 'delete_banner'])->name('banner.delete');

        // MPD Routes
        Route::get('/mpd', [MPDController::class, 'mpd_list'])->name('mpd.list');
        Route::get('/mpd/create', [MPDController::class, 'create_mpd'])->name('mpd.create');
        Route::post('/mpd/store', [MPDController::class, 'store_mpd'])->name('mpd.store');
        Route::delete('/mpd/delete/{id}', [MPDController::class, 'delete_mpd'])->name('mpd.delete');

        //Latest News & Announcements
        Route::get('/latestnews&announcements', [LatestNewsAnnouncementsController::class, 'lna_list'])->name('lna.list');
        Route::get('/latestnews&announcements/create', [LatestNewsAnnouncementsController::class, 'create_lna'])->name('lna.create');
        Route::post('/latestnews&announcements/store', [LatestNewsAnnouncementsController::class, 'store_lna'])->name('lna.store');
        Route::delete('/latestnewsannouncements/delete/{id}', [LatestNewsAnnouncementsController::class, 'delete_lna'])->name('lna.delete');

        //transercertificates
        Route::get('/tc', [TranserCertificateController::class, 'tc_list'])->name('tc.list');
        Route::get('/tc/create', [TranserCertificateController::class, 'create_tc'])->name('tc.create');
        Route::post('/tc/store', [TranserCertificateController::class, 'store_tc'])->name('tc.store');
        Route::delete('/tc/delete/{id}', [TranserCertificateController::class, 'delete_tc'])->name('tc.delete');

        // Gallery Routes
        Route::get('/gallery', [GalleryController::class, 'gallery_list'])->name('gallery.list');
        Route::get('/gallery/create', [GalleryController::class, 'create_gallery'])->name('gallery.create');
        Route::post('/gallery/store', [GalleryController::class, 'store_gallery'])->name('gallery.store');
        Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit_gallery'])->name('gallery.edit');
        Route::put('/gallery/update/{id}', [GalleryController::class, 'update_gallery'])->name('gallery.update');
        Route::post('gallery/upload/{id}', [GalleryController::class, 'uploadImages'])->name('gallery.upload');
        Route::delete('/gallery/delete/{id}', [GalleryController::class, 'delete_gallery'])->name('gallery.delete');

        //  Route::delete('/gallery/delete/{id}', [GalleryController::class, 'delete_gallery'])->name('gallery.delete');

        //activites.
        Route::get('/activites', [ActivityController::class, 'activites_list']);
        Route::get('/activites/create', [ActivityController::class, 'create_activites']);
        Route::post('/activites/store', [ActivityController::class, 'store_activites']);
        Route::get('/activites/edit/{id}', [ActivityController::class, 'edit_activites']);
        Route::post('/activites/update', [ActivityController::class, 'update_activites']);
        Route::delete('/activites/delete/{id}', [ActivityController::class, 'delete_activites']);

        //marquee 
        Route::get('/marquee/create/{id}', [MarqueesController::class, 'create_marquee'])->name('marquee.create');
        Route::post('/marquee/store', [MarqueesController::class, 'store_marquee'])->name('marquee.store');
        Route::get('/marquee/edit/{id}', [MarqueesController::class, 'edit_marquee'])->name('marquee.edit');
        Route::post('/marquee/update/{id}', [MarqueesController::class, 'update_marquee'])->name('marquee.update');

        //social media  
        Route::get('/social-contact', [SocialContactController::class, 'social_edit'])->name('edit.social_contact');
        Route::post('/social-contact', [SocialContactController::class, 'social_update'])->name('update.social_contact');

        //PrincipalDesk
        Route::get('/principal-desk', [PrinciapalDeskController::class, 'principal_edit'])->name('edit.principal-desk');
        Route::post('/principal-desk', [PrinciapalDeskController::class, 'principal_update'])->name('update.principal-desk');

         //PrincipalDesk
         Route::get('/chairman-desk', [ChairmanDeskController::class, 'chairman_edit'])->name('edit.chairman-desk');
         Route::post('/chairman-desk', [ChairmanDeskController::class, 'chairman_update'])->name('update.chairman-desk');

        //Calender
        Route::get('/fullcalender', [FullCalenderController::class, 'index']);
        Route::post('/fullcalenderAjax', [FullCalenderController::class, 'ajax']);

        //Admission 
        Route::get('/admission', [AdmissionProcedureController::class, 'admission_list'])->name('admission.list');
        Route::get('/admission/create', [AdmissionProcedureController::class, 'create_admission'])->name('admission.create');
        Route::post('/admission/store', [AdmissionProcedureController::class, 'store_admission'])->name('admission.store');
        Route::get('/admission/edit/{id}', [AdmissionProcedureController::class, 'edit_admission'])->name('admission.edit');
        Route::post('/admission/update/{id}', [AdmissionProcedureController::class, 'update_admission'])->name('admission.update');
        Route::delete('/admission/delete/{id}', [AdmissionProcedureController::class, 'delete_admission'])->name('admission.delete');

        //Syllabus
        Route::get('/syllabus', [SyllabusController::class, 'syllabus_list'])->name('syllabus.list');
        Route::get('/syllabus/create', [SyllabusController::class, 'create_syllabus'])->name('syllabus.create');
        Route::post('/syllabus/store', [SyllabusController::class, 'store_syllabus'])->name('syllabus.store');
        Route::delete('/syllabus/delete/{id}', [SyllabusController::class, 'delete_syllabus'])->name('syllabus.delete');

        //fee structure
        Route::get('/fee-structure', [FeeStructureController::class, 'feestructure_list'])->name('feestructure.list');
        Route::get('/fee-structure/create', [FeeStructureController::class, 'create_feestructure'])->name('feestructure.create');
        Route::post('/fee-structure/store', [FeeStructureController::class, 'store_feestructure'])->name('feestructure.store');
        Route::delete('/fee-structure/delete/{id}', [FeeStructureController::class, 'delete_feestructure'])->name('feestructure.delete');

        //Achievers
        Route::get('/achievers', [AchieversDataController::class, 'achievers_list'])->name('achievers.list');
        Route::get('/achievers/create', [AchieversDataController::class, 'create_achievers'])->name('achievers.create');
        Route::post('/achievers/store', [AchieversDataController::class, 'store_achievers'])->name('achievers.store');
        Route::get('/achievers/edit/{id}', [AchieversDataController::class, 'edit_achievers'])->name('achievers.edit');
        Route::put('/achievers/update/{id}', [AchieversDataController::class, 'update_achievers'])->name('achievers.update');
        Route::delete('/achievers/delete/{id}', [AchieversDataController::class, 'delete_achievers'])->name('achievers.delete');
        //  Route::post('/achievers/delete-image', 'AchieverController@deleteAchieverImage')->name('achievers.deleteImage');

        // Scout&guide Routes
        Route::get('/scout-&-guide', [ScoutGuideController::class, 'scout_list'])->name('scout.list');
        Route::get('/scout-&-guide/create', [ScoutGuideController::class, 'create_scout'])->name('scout.create');
        Route::post('/scout-&-guide/store', [ScoutGuideController::class, 'store_scout'])->name('scout.store');
        Route::delete('/scout-&-guide/delete/{id}', [ScoutGuideController::class, 'delete_scout'])->name('scout.delete');
        Route::post('/scout-&-guide/delete-multiple', [ScoutGuideController::class, 'delete_multiple_scout']);

        // Scout&guide Routes
        Route::get('/sports', [SportImageController::class, 'sports_list'])->name('sports.list');
        Route::get('/sports/create', [SportImageController::class, 'create_sports'])->name('sports.create');
        Route::post('/sports/store', [SportImageController::class, 'store_sports'])->name('sports.store');
        Route::delete('/sports/delete/{id}', [SportImageController::class, 'delete_sports'])->name('sports.delete');
        Route::post('/sports/delete-multiple', [SportImageController::class, 'delete_multiple_sports']);

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('category');
            Route::get('/category/create', 'create_category')->name('categoryCreate');
            Route::post('/category/check', 'check_category')->name('categoryCheck');
            Route::post('/category/save', 'save_category')->name('categorySave');
            Route::get('/category/delete/{id}/{path}', 'delete_category')->name('categoryDelete');
        });

        // Product
        Route::controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('products');
            Route::get('/product/create', 'create_product')->name('productCreate');
            Route::post('/product/check', 'check_product')->name('productCheck');
            Route::post('/product/save', 'save_product')->name('producSave');
            Route::post('/product/images/', 'getImages_product')->name('productGetImages');
            Route::get('/product/images/{product}', 'addImages_product')->name('productAddImages');
            Route::post('/product/images/save', 'addImagesSave_product')->name('productAddImagesSave');
            Route::post('/product/images/delete', 'deleteImages_product')->name('productDeleteImages');
            Route::get('/product/edit/{product}', 'edit_product')->name('productEdit');
            Route::post('/product/edit/{product}/{id}/save', 'editSave_product')->name('productEditSave');
            Route::get('/product/delete/{id}', 'delete_product')->name('productDelete');
        });

        //activites.
        Route::get('/facilities', [FacilityController::class, 'facilities_list']);
        Route::get('/facilities/create', [FacilityController::class, 'create_facilities']);
        Route::post('/facilities/store', [FacilityController::class, 'store_facilities']);
        Route::get('/facilities/edit/{id}', [FacilityController::class, 'edit_facilities']);
        Route::post('/facilities/update', [FacilityController::class, 'update_facilities']);
        Route::delete('/facilities/delete/{id}', [FacilityController::class, 'delete_facilities']);

        Route::get('/vision&mission', [VisionMissionController::class, 'visionMission']);
        Route::post('/vision&mission/store', [VisionMissionController::class, 'store_visionMission']);

        Route::get('/schoolOverView', [SchoolOverViewController::class, 'schoolOverView']);
        Route::post('/schoolOverView/store', [SchoolOverViewController::class, 'store_schoolOverView']);
    });
});
