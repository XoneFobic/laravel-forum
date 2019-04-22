<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Thread;
use Tests\DatabaseTestCase;

/**
 * Class CreateThreadsTest
 *
 * @package Tests\Feature
 */
class CreateThreadsTest extends DatabaseTestCase {
  /** @test */
  function a_guest_may_not_create_threads () {
    $this->withExceptionHandling();

    $this->get( '/threads/create' )
      ->assertRedirect( '/login' );

    $this->post( '/threads' )
      ->assertRedirect( '/login' );
  }

  /** @test */
  function an_authenticated_user_can_create_new_forum_threads () {
    $this->signIn();

    /** @var Thread $thread */
    $thread = create( Thread::class );

    $this->post( '/threads', $thread->toArray() );

    $this->get( $thread->path() )
      ->assertSee( $thread->title )
      ->assertSee( $thread->body );
  }
}
