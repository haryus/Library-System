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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['middleware' =>'guest', function(){
  return view('auth.login');
}]);

Auth::routes();

Route::namespace('App\Http\Controllers')->middleware('auth')->group(function(){
  Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/','DashboardController@index')->name('index');
  });

  //Authors
  Route::get('/authors/data_authors', 'AuthorController@data_authors')->name('authors.data_authors');
  Route::resource('authors','AuthorController');

  //Genres
  Route::get('/genres/data_genres', 'GenreController@data_genres')->name('genres.data_genres');
  Route::resource('genres','GenreController');

  //Books
  Route::get('/books/data_books', 'BookController@data_books')->name('books.data_books');
  Route::resource('books','BookController');

  //Sale
  Route::get('/sales/data_sales', 'SaleController@data_sales')->name('sales.data_sales');
  Route::resource('sales','SaleController');

  //Staff
  Route::get('/staffs/data_staffs', 'StaffController@data_staffs')->name('staffs.data_staffs');
  Route::resource('staffs','StaffController');

  //User
  Route::prefix('users')->name('users.')->group(function(){
    Route::get('/','UserController@index')->name('index');
    Route::get('/data_users','UserController@data_users')->name('data_users');
    Route::get('/{user}/edit','UserController@edit')->name('edit');
    Route::post('/store','UserController@store')->name('store');
    Route::patch('/{user}','UserController@update')->name('update');
    Route::delete('/{user}','UserController@destroy  ')->name('destroy ');
  });
});



