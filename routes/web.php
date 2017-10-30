<?php

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

Route::get('/', "PageController@home")->name("home");

Route::get('/search', "PageController@search")->name("search");

Route::post('/search', "PageController@searchKey")->name("search.key");

Route::group(["middleware" => "guest"], function(){

    Route::get("/signup", "PageController@signup")->name("signup");

    Route::get("/login", "PageController@login")->name("login");

    Route::post("/user/signup", "UserController@store")->name("user.signup");

    Route::post("/user/login", "UserController@login")->name("user.login");
});

Route::group(["middleware" => "auth"], function(){

    Route::get("/user/profile", "UserController@profile")->name("user.profile");

    Route::get("/user/logout", "UserController@logout")->name("user.logout");

    Route::post("/user/post/publish", "PostController@publish")->name("post.publish");

    Route::get("/user/settings", "UserController@settings")->name("user.settings");

    Route::post("/user/update", "PostController@update")->name("user.update");

    Route::get("/user/post/delete/{id}", "PostController@delete")->name("post.delete");
});
