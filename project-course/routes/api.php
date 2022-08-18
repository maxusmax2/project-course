<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CompareController;
use Illuminate\Support\Facades\Auth;

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
//роут выдающий деталку товара
Route::get('/catalog/sale-{buildType}/{id}',[DetailController::class,'getDetail']);

/*
    группа роутов связнная с избранным и сравнением (добавление,удаление,просмотр).
    Объеденил,потому что для них нужна аутентификация (посредних auth:api)
*/
Route::middleware('auth:api')->group(function(){

    //Добавление и удаление  объектов из избранного
    Route::post('/catalog/sale-{buildType}/{id}/append-favorite',[FavoriteController::class,'appendFavorite']);
    Route::post('/catalog/sale-{buildType}/{id}/delete-favorite',[FavoriteController::class,'deleteFavorite']);

    //Выдача объектов из избранного для определенного пользователя
    Route::get('/favorite',[FavoriteController::class,'getFavorite']);

    //Добавление и удаление  объектов из сравнения
    Route::post('/catalog/sale-{buildType}/{id}/append-compare',[CompareController::class,'appendCompare']);
    Route::post('/catalog/sale-{buildType}/{id}/delete-compare',[CompareController::class,'deleteCompare']);

    //Выдача объектов из сравнения для определенного пользователя
    Route::get('/compare',[CompareController::class,'getCompare']);
});
