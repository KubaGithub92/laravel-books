<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('index/index');
// })->name('home');

// Route::get('/about', function () {
//     return view('about/about-us');
// })->name('about');

Route::view('/about', "about/about-us")->name('about');
Route::get('/api/test/array', [TestController::class, 'arrayResponse']);
Route::get('/api/test/model', [TestController::class, 'modelResponse']);
Route::get('/api/test/book/{book_id}', [TestController::class, 'book']);
Route::get('/api/test/collection', [TestController::class, 'collectionResponse']);
Route::get('/', [HomepageController::class, 'displayHome'])->name('homepage');
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');
