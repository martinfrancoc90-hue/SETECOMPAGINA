<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
//     return view('welcome');
// });

// Auth::routes();
// Route::group(['middleware' => ['cors']], function () {

Route::get('/', [HomeController::class, 'index']);

Route::post('/send-message', [HomeController::class, 'send'])->name('send.message');

// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::group(['prefix' => 'intranet'], function () {
//         $i='IntranetController';
//         Route::get('/', "$i@index")->name('home');

//         Route::group(['prefix' => 'item'], function () {
//             $i="ItemController";
//             Route::get ('', "$i@index");
//             Route::get ('/create', "$i@create");
//             Route::post ('/create', "$i@store");
//             Route::get ('/edit', "$i@show");
//             Route::get ('/edit', "$i@edit");
//             Route::post ('/delete', "$i@delete");
//         });

//         Route::group(['prefix' => 'contact'], function () {
//             $c="ContactController";
//             Route::get ('', "$c@index");
//         });
//     });
// });
