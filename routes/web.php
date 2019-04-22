<?php declare( strict_types = 1 );

// Standard Laravel Authentication
Auth::routes();

// Home
Route::get( '/', 'HomeController@index' );

// Threads
Route::resource( '/threads', 'ThreadsController' );
Route::post( '/threads/{thread}/replies', 'RepliesController@store' );
