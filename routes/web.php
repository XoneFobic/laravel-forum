<?php declare( strict_types = 1 );

Auth::routes();

Route::get( '/', function () {
  return view( 'welcome' );
} );

Route::get( '/home', 'HomeController@index' );
Route::get( '/threads', 'ThreadsController@index' );
Route::post( '/threads', 'ThreadsController@store' );
Route::get( '/threads/{thread}', 'ThreadsController@show' );
Route::post( '/threads/{thread}/replies', 'RepliesController@store' );
