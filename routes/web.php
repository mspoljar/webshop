<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ItemController;

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
    return redirect()->route('welcome-locale', app()->getLocale());
})->name('welcome');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome-locale');
});

Route::group(['middleware'=>'web'],function(){
    Route::get('/items',[ItemController::class, 'index']);
    Route::get('/item/change/{id}',[ItemController::class, 'change']);
    Route::post('/item/update',[ItemController::class,'update']);
    Route::get('/test',[ItemController::class, 'test']);
});

