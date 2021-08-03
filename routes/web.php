<?php

use App\Http\Controllers\MyblogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
    return view('welcome');
});

Route::group(["prefix" => "ads"], function () {
    Route::get("first", function () {
        return view("second");
    });

    Route::get("second", function () {
        return view("second");
    });

    Route::get("ahan/{id}", function ($id) {
//        \App\Models\User::create([
//            "name" => "Reza",
//            "email" => "rezaparsian761@gmail.com",
//            "password" => bcrypt("123")
//        ]);
        $user = User::findOrFail($id);
        return view("second", compact("user"));
    });
});


//Route::get("user/{user}",[MyblogController::class,"index"]);

Route::resource("user", UserController::class);
Route::resource("post", PostController::class)->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
