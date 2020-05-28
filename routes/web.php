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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/contact', function () {
//     //return view('pages/contact');
//     return view('pages.contact');
// });

// Route::get('/blog/{id}/{title}', function ($id,$title) {
  
//     // return "The blog id is ".$id;
//     return $title.' with id n: '.$id;
//     //return view('pages.blog');
// });

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/','PagesController@index');
Route::get('/contact','PagesController@contact');
Route::get('/about','PagesController@about');
Route::get('/policies','PagesController@policies');
Route::get('/employment','PagesController@employment')->name('employment');

// Route::get('/blog','PostsController@index');
Route::resource('/post','PostsController');





