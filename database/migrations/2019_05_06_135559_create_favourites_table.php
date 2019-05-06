<?php declare( strict_types = 1 );

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateFavouritesTable
 */
class CreateFavouritesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up () {
    Schema::create( 'favourites', function ( Blueprint $table ) {
      $table->bigIncrements( 'id' );
      $table->unsignedBigInteger( 'user_id' );
      $table->unsignedBigInteger( 'favourited_id' );
      $table->string( 'favourited_type', 50 );
      $table->timestamps();

      $table->unique( [ 'user_id', 'favourited_id', 'favourited_type' ] );
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down () {
    Schema::dropIfExists( 'favourites' );
  }
}
