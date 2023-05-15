<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomobiliaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavininkaiController;
use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// role = 0, paprastas vartotojas. role = 1, puslapio administratorius;
// role pakeiciama per localhost;

Route::middleware('auth')->group(function(){

 Route::get('/savininkai/create',[ SavininkaiController::class, 'create'])->name('savininkai.create')->middleware('is_admin');
 Route::post('/savininkai/save',[ SavininkaiController::class, 'save'])->name('savininkai.save')->middleware('is_admin');
 Route::get('/savininkai/{id}/edit',[ SavininkaiController::class, 'edit'])->name('savininkai.edit')->middleware('is_admin');
 Route::post('/savininkai/{id}/update',[SavininkaiController::class,'update'])->name('savininkai.update')->middleware('is_admin');
 Route::get('/savininkai/{id}/delete',[SavininkaiController::class,'delete'])->name('savininkai.delete')->middleware('is_admin');

 Route::resource('automobiliais', AutomobiliaiController::class)->middleware('is_admin');  

 Route::get('/savininkai',[SavininkaiController::class, 'index'])->name('savininkai.index');
 Route::get('/automobiliais',[AutomobiliaiController::class, 'index'])->name('automobiliais.index');

 Route::post('/savininkai/search',[SavininkaiController::class,'search'])->name('savininkai.search');

 Route::post('/automobiliais/search',[AutomobiliaiController::class,'search'])->name('automobiliais.search');
});


Route::get('/create-symlink', function (){
    symlink(storage_path('/app/public'), public_path('storage'));
});

Route::get('/setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
