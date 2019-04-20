<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Thread;
use Illuminate\Auth\AuthenticationException;
use Tests\DatabaseTestCase;

/**
 * Class CreateThreadsTest
 *
 * @package Tests\Feature
 */
class CreateThreadsTest extends DatabaseTestCase {
  /** @test */
  function a_guest_may_not_create_threads () {
    $this->expectException( AuthenticationException::class );
    $this->post( '/threads', raw( Thread::class ) );
  }

  /** @test */
  function an_authenticated_user_can_create_new_forum_threads () {
    $this->signIn();

    /** @var Thread $thread */
    $thread = make( Thread::class );

    $this->post( '/threads', $thread->toArray() );

    $this->get( $thread->path() )
      ->assertSee( $thread->title )
      ->assertSee( $thread->body );
  }
}
