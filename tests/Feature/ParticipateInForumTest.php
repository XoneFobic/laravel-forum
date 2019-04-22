<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Tests\DatabaseTestCase;

/**
 * Class ParticipateInForumTest
 *
 * @package Tests\Feature
 */
class ParticipateInForumTest extends DatabaseTestCase {
  /** @test */
  function an_unauthenticated_user_may_not_participate_in_forum_threads () {
    $this->withExceptionHandling()
      ->post( 'threads/foobar/1/replies', [] )
      ->assertRedirect( '/login' );
  }

  /** @test */
  function an_authenticated_user_may_participate_in_forum_threads () {
    /** @var User $user */
    $this->signIn( $user = create( User::class ) );

    /** @var Thread $thread */
    $thread = create( Thread::class );

    /** @var Reply $reply */
    $reply = make( Reply::class );

    $this->post( $thread->path() . '/replies', $reply->toArray() );

    $this->get( $thread->path() )->assertSee( $reply->body );
  }

  /** @test */
  function a_reply_requires_a_body () {
    /** @var User $user */
    $this->withExceptionHandling()->signIn( $user = create( User::class ) );

    /** @var Thread $thread */
    $thread = create( Thread::class );

    /** @var Reply $reply */
    $reply = make( Reply::class, [ 'body' => null ] );

    $this->post( $thread->path() . '/replies', $reply->toArray() )
      ->assertSessionHasErrors( 'body' );
  }
}
