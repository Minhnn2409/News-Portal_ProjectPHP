<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Logout
Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

//Admin Category
Route::get('/categories', [\App\Http\Controllers\backend\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [\App\Http\Controllers\backend\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [\App\Http\Controllers\backend\CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [\App\Http\Controllers\backend\CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [\App\Http\Controllers\backend\CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/delete/{id}', [\App\Http\Controllers\backend\CategoryController::class, 'delete'])->name('categories.delete');

//Admin SubCategory
Route::get('/subcategories', [\App\Http\Controllers\backend\SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/subcategories/create', [\App\Http\Controllers\backend\SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories/store', [\App\Http\Controllers\backend\SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/edit/{id}', [\App\Http\Controllers\backend\SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::post('/subcategories/update/{id}', [\App\Http\Controllers\backend\SubCategoryController::class, 'update'])->name('subcategories.update');
Route::get('/subcategories/delete/{id}', [\App\Http\Controllers\backend\SubCategoryController::class, 'delete'])->name('subcategories.delete');

//Admin Districts
Route::get('/districts', [\App\Http\Controllers\backend\DistrictController::class, 'index'])->name('districts');
Route::get('/districts/create', [\App\Http\Controllers\backend\DistrictController::class, 'create'])->name('districts.create');
Route::post('/districts/store', [\App\Http\Controllers\backend\DistrictController::class, 'store'])->name('districts.store');
Route::get('/districts/edit/{id}', [\App\Http\Controllers\backend\DistrictController::class, 'edit'])->name('districts.edit');
Route::post('/districts/update/{id}', [\App\Http\Controllers\backend\DistrictController::class, 'update'])->name('districts.update');
Route::get('/districts/delete/{id}', [\App\Http\Controllers\backend\DistrictController::class, 'delete'])->name('districts.delete');

//Admin SubDistricts
Route::get('/subdistricts', [\App\Http\Controllers\backend\SubDistrictController::class, 'index'])->name('subdistricts');
Route::get('/subdistricts/create', [\App\Http\Controllers\backend\SubDistrictController::class, 'create'])->name('subdistricts.create');
Route::post('/subdistricts/store', [\App\Http\Controllers\backend\SubDistrictController::class, 'store'])->name('subdistricts.store');
Route::get('/subdistricts/edit/{id}', [\App\Http\Controllers\backend\SubDistrictController::class, 'edit'])->name('subdistricts.edit');
Route::post('/subdistricts/update/{id}', [\App\Http\Controllers\backend\SubDistrictController::class, 'update'])->name('subdistricts.update');
Route::get('/subdistricts/delete/{id}', [\App\Http\Controllers\backend\SubDistrictController::class, 'delete'])->name('subdistricts.delete');

//Json Data for Category and Districts

Route::get('/get/subcategory/{category_id}', [\App\Http\Controllers\backend\PostController::class, 'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [\App\Http\Controllers\backend\PostController::class, 'GetSubDistrict']);

//Admin Posts
Route::get('/posts', [\App\Http\Controllers\backend\PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [\App\Http\Controllers\backend\PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [\App\Http\Controllers\backend\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{id}', [\App\Http\Controllers\backend\PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [\App\Http\Controllers\backend\PostController::class, 'update'])->name('posts.update');
Route::get('/posts/delete/{id}', [\App\Http\Controllers\backend\PostController::class, 'delete'])->name('posts.delete');

// Social Settings
Route::get('/social/setting', [\App\Http\Controllers\backend\SettingController::class, 'SocialSetting'])->name('social.setting');
Route::post('/social/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'UpdateSetting'])->name('update.setting');

//Seo Setting
Route::get('/seo/setting', [\App\Http\Controllers\backend\SettingController::class, 'SeoSetting'])->name('seo.setting');
Route::post('/seo/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'UpdateSeo'])->name('update.seo');

//Prayer Setting
Route::get('/prayer/setting', [\App\Http\Controllers\backend\SettingController::class, 'PrayerSetting'])->name('prayer.setting');
Route::post('/prayer/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'UpdatePrayer'])->name('update.prayer');

//Livetv Setting
Route::get('/livetv/setting', [\App\Http\Controllers\backend\SettingController::class, 'LivetvSetting'])->name('livetv.setting');
Route::post('/livetv/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'UpdateLivetv'])->name('update.livetv');
Route::get('/livetv/active/{id}', [\App\Http\Controllers\backend\SettingController::class, 'ActiveSetting'])->name('active.livetv');
Route::get('/livetv/deactive/{id}', [\App\Http\Controllers\backend\SettingController::class, 'DeActiveSetting'])->name('deactive.livetv');

// Notices Setting
Route::get('/notice/setting', [\App\Http\Controllers\backend\SettingController::class, 'NoticeSetting'])->name('notice.setting');
Route::post('/notice/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'UpdateNotice'])->name('update.notice');
Route::get('/notice/active/{id}', [\App\Http\Controllers\backend\SettingController::class, 'ActiveNotice'])->name('active.notice');
Route::get('/notice/deactive/{id}', [\App\Http\Controllers\backend\SettingController::class, 'DeActiveNotice'])->name('deactive.notice');

//Websites Link route
Route::get('/websites', [\App\Http\Controllers\backend\SettingController::class, 'index'])->name('websites');
Route::get('/websites/create', [\App\Http\Controllers\backend\SettingController::class, 'create'])->name('websites.create');
Route::post('/websites/store', [\App\Http\Controllers\backend\SettingController::class, 'store'])->name('websites.store');
Route::get('/websites/edit/{id}', [\App\Http\Controllers\backend\SettingController::class, 'edit'])->name('websites.edit');
Route::post('/websites/update/{id}', [\App\Http\Controllers\backend\SettingController::class, 'update'])->name('websites.update');
Route::get('/websites/delete/{id}', [\App\Http\Controllers\backend\SettingController::class, 'delete'])->name('websites.delete');

//Gallery route
//Photos
Route::get('/photos', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoIndex'])->name('photos');
Route::get('/photos/create', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoCreate'])->name('photos.create');
Route::post('/photos/store', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoStore'])->name('photos.store');
Route::get('/photos/edit/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoEdit'])->name('photos.edit');
Route::post('/photos/update/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoUpdate'])->name('photos.update');
Route::get('/photos/delete/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'PhotoDelete'])->name('photos.delete');
//Videos
Route::get('/videos', [\App\Http\Controllers\backend\GalleryController::class, 'VideoIndex'])->name('videos');
Route::get('/videos/create', [\App\Http\Controllers\backend\GalleryController::class, 'VideoCreate'])->name('videos.create');
Route::post('/videos/store', [\App\Http\Controllers\backend\GalleryController::class, 'VideoStore'])->name('videos.store');
Route::get('/videos/edit/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'VideoEdit'])->name('videos.edit');
Route::post('/videos/update/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'VideoUpdate'])->name('videos.update');
Route::get('/videos/delete/{id}', [\App\Http\Controllers\backend\GalleryController::class, 'VideoDelete'])->name('videos.delete');
