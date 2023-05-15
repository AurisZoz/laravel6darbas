<?php

use App\Http\Controllers\SavininkaiAPIController;
use App\Http\Controllers\AutomobiliaiAPIController;
use App\Models\Automobiliai;
use App\Models\Savininkai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('savininkai', SavininkaiAPIController::class);

Route::resource('automobiliais', AutomobiliaiAPIController::class);


Route::get('/duomenys', function (){
    return ["vardas"=>"Jonas", "pavarde"=>"Jonaitis"];
});
