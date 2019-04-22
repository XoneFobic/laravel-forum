<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Channel;
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
    $thread = make( Thread::class );

    $response = $this->post( '/threads', $thread->toArray() );

    $this->get( $response->headers->get( 'Location' ) )
      ->assertSee( $thread->title )
      ->assertSee( $thread->body );
  }

  /** @test */
  function a_thread_requires_a_title () {
    $this->publishThread( [ 'title' => null ] )
      ->assertSessionHasErrors( 'title' );
  }

  /**
   * @param array $overrides
   *
   * @return \Illuminate\Foundation\Testing\TestResponse
   */
  public function publishThread ( array $overrides = [] ) {
    $this->withExceptionHandling()->signIn();

    $thread = raw( Thread::class, $overrides );

    return $this->post( '/threads', $thread );
  }

  /** @test */
  function a_thread_requires_a_body () {
    $this->publishThread( [ 'body' => null ] )
      ->assertSessionHasErrors( 'body' );
  }

  /** @test */
  function a_thread_requires_a_valid_channel () {
    factory( Channel::class, 2 )->create();

    $this->publishThread( [ 'channel_id' => null ] )
      ->assertSessionHasErrors( 'channel_id' );

    $this->publishThread( [ 'channel_id' => 999 ] )
      ->assertSessionHasErrors( 'channel_id' );
  }
}
