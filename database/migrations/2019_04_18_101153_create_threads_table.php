<?php declare( strict_types = 1 );

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateThreadsTable
 */
class CreateThreadsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up () {
    Schema::create( 'threads', function ( Blueprint $table ) {
      $table->bigIncrements( 'id' );
      $table->unsignedBigInteger( 'user_id' );
      $table->unsignedBigInteger( 'channel_id' );
      $table->string( 'title' );
      $table->text( 'body' );
      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down () {
    Schema::dropIfExists( 'threads' );
  }
}
