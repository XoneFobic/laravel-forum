<?php declare( strict_types = 1 );

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateChannelsTable
 */
class CreateChannelsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up () {
    Schema::create( 'channels', function ( Blueprint $table ) {
      $table->bigIncrements( 'id' );
      $table->string( 'name', 50 );
      $table->string( 'slug', 50 );
      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down () {
    Schema::dropIfExists( 'channels' );
  }
}
