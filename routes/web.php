<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AdminPanelController;
use App\Http\Controllers\Back\AdminAuthController;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Back\PagesController;
use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Back\ContactController;

//ADMİN ROUTE'S

Route::prefix('admin')->middleware('İsAdminLogout')->name('admin.')->group(function (){
    Route::get('giris' , [AdminAuthController::class , 'index'])->name('giris');
    Route::post('giris' , [AdminAuthController::class , 'indexPost'])->name('giris.post');
});

Route::prefix('admin')->middleware('İsAdmin')->name('admin.')->group(function (){
    Route::get('/', [AdminPanelController::class , 'index'])->name('panel');
    Route::get('cikis' , [AdminAuthController::class , 'indexLogout'])->name('logout');
    Route::resource('makaleler' , PostController::class);
    Route::resource('sayfalar' , PagesController::class);
    Route::get('makale/sil/{id}', [PostController::class , 'delete'])->name('post.delete');
    Route::get('sayfa/sil/{id}', [PagesController::class , 'delete'])->name('page.delete');
    Route::get('ayarlar' ,[SettingsController::class , 'index'])->name('setting');
    Route::post('ayarlar' ,[SettingsController::class , 'indexPost'])->name('setting.post');
    Route::get('iletisim' , [ContactController::class , 'index'])->name('contact');
    Route::get('iletisim/sil/{id}' , [ContactController::class , 'delete'])->name('contact.delete');
    Route::get('iletisim/{id}' ,[ContactController::class , 'contactRead'])->name('contact.read');
    Route::post('iletisim/{id}' ,[ContactController::class , 'contactPost'])->name('contact.post');
});

//FRONT ROUTE'S

Route::get('/',[HomepageController::class , 'index'])->name('homepage');
Route::get('Makaleler/{id}' , [HomepageController::class , 'post'])->name('post');
Route::get('iletisim' , [HomepageController::class , 'contact'])->name('contact');
Route::post('iletisim' , [HomepageController::class , 'contactPost'])->name('contact.post');
Route::get('/{slug}', [HomepageController::class , 'pages'])->name('pages');
