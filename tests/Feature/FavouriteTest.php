<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Reply;
use Exception;
use Tests\DatabaseTestCase;

/**
 * Class FavouriteTest
 *
 * @package Tests\Feature
 */
class FavouriteTest extends DatabaseTestCase {
  /** @test */
  public function a_guest_can_not_favourite_anything () {
    $this->withExceptionHandling()
      ->post( '/replies/1/favourites' )
      ->assertRedirect( '/login' );
  }

  /** @test */
  public function an_authenticated_user_can_favourite_any_reply () {
    $this->signIn();

    /** @var Reply $reply */
    $reply = create( Reply::class );

    $this->post( '/replies/' . $reply->id . '/favourites' );

    $this->assertCount( 1, $reply->favourites );
  }

  /** @test */
  public function an_authenticated_user_may_only_favourite_a_reply_once () {
    $this->signIn();

    /** @var Reply $reply */
    $reply = create( Reply::class );

    try {
      $this->post( '/replies/' . $reply->id . '/favourites' );
      $this->post( '/replies/' . $reply->id . '/favourites' );
    } catch (Exception $exception) {
      $this->fail( 'Did not expect to insert the same record set twice.' );
    }

    $this->assertCount( 1, $reply->favourites );
  }
}
