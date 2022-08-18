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
//Начальная страница оставлена для тестирования регистрации пользователей
Route::get('/', function () {
    return view('welcome');
});
//route выдаваемый после аутентификации пользователя
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Загружаем все роуты нужные для аутентификации
require __DIR__.'/auth.php';
