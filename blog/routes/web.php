<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\dashboardController;

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
    return view('front.home');
});

Route::get('/', 'HomeGetController@home')->name("home");
Route::get('/home', 'HomeGetController@home')->name("home");
Route::get('/about', 'HomeGetController@about')->name("about");
Route::get('/contact', 'HomeGetController@contact')->name("contact");
Route::post('contact', 'HomeGetController@storeMessage')->name("storeMessage");
Route::get('/post', 'HomeGetController@post')->name("post");
Route::get('post/{id}', 'HomeGetController@showPost')->name("showPost");


Route::get('/login', 'dashboardController@login');
Route::post('login', 'LoginController@check')->name("check");

Route::group(['middleware'=>['AuthCheck']], function(){

    Route::get('/dashboard', 'dashboardController@dashboard')->name("dashboard");

    Route::get('/general', 'dashboardController@general')->name("general");
    Route::POST('/general', 'dashboardController@storePost')->name("storePost");
    Route::get('deletePost/{id}', 'dashboardController@deletePost')->name("deletePost");
    Route::get('editPost/{id}', 'dashboardController@editPost')->name("editPost");
    Route::POST('updatePost', 'dashboardController@updatePost')->name("updatePost");
    
    Route::POST('/general/addCategory', 'dashboardController@addCategory')->name("addCategory");

    Route::get('/message', 'dashboardController@message')->name("message");
    Route::post('/message/send', 'dashboardController@sendMail')->name("sendMail");

    Route::get('/simple', 'dashboardController@simple')->name("simple");
    Route::get('/data', 'dashboardController@data')->name("data");
    Route::get('/registration', 'dashboardController@registration')->name("registration");
    Route::get('deleteUser/{id}', 'dashboardController@deleteUser')->name("deleteUser");
    Route::post('registration', 'dashboardController@store')->name("store");
    Route::get('/logout', 'dashboardController@logout')->name('logout');
});