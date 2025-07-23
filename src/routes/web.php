<?php

use Illuminate\Support\Facades\Route;

Route::get('/test1/{room}/{id}', function ($room, $id) {
    return 'roomが' . $room . 'でidは' . $id . 'です';
});
Route::get('/test2/{greeting?}', function ($greeting = 'Goodmorning') {
    return $greeting . '=おはようございます';
});

use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index']);

use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'index']);

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
