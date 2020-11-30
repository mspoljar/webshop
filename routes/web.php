<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/item/new', [ItemController::class, 'new']);
    Route::post('/item/create', [ItemController::class, 'create']);
    Route::get('/item/delete/{id}', [ItemController::class, 'delete']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/new',[CategoryController::class, 'new']);
    Route::post('/category/create', [CategoryController::class, 'create']);
    Route::get('/category/change/{id}',[CategoryController::class, 'change']);
    Route::post('/category/update',[CategoryController::class,'update']);
    Route::get('/category/delete/{id}',[CategoryController::class, 'delete']);
});

