<?php

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UrlController;
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
    return view('pages.welcome');
});

Route::get('/to/{urlMask}', [UrlController::class, 'to']);

Route::post('/url/create', [UrlController::class, 'addUrl']);
Route::get('/url/create', function () {
    return redirect('/');
});

Route::get('/statistics', [StatisticsController::class, 'index']);
Route::post('/statistics/check', [StatisticsController::class, 'check']);

