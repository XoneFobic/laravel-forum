<?php declare( strict_types = 1 );

// Standard Laravel Authentication
Auth::routes();

// Home
Route::get( '/home', 'HomeController@index' );

// Threads
Route::group( [ 'prefix' => '/threads' ], function () {
  Route::get( '/create', 'ThreadsController@create' );
  Route::get( '/{channel?}', 'ThreadsController@index' );
  Route::get( '/{channel}/{thread}', 'ThreadsController@show' );

  Route::post( '/', 'ThreadsController@store' );
  Route::post( '/{channel}/{thread}/replies', 'RepliesController@store' );
} );

Route::group( [ 'prefix' => '/replies' ], function () {
  Route::post( '/{reply}/favourites', 'FavouritesController@store' );
} );

Route::get( '/profiles/{user}', 'ProfilesController@show' );
