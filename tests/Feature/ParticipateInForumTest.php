<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ParticipateInForumTest
 *
 * @package Tests\Feature
 */
class ParticipateInForumTest extends TestCase {
  use DatabaseMigrations;

  /** @test */
  function an_unauthenticated_user_may_not_participate_in_forum_threads () {
    $this->expectException( 'Illuminate\Auth\AuthenticationException' );

    $this->post( 'threads/1/replies', [] );
  }

  /** @test */
  function an_authenticated_user_may_participate_in_forum_threads () {
    /** @var User $user */
    $this->signIn( $user = factory( User::class )->create() );

    /** @var Thread $thread */
    $thread = factory( Thread::class )->create();

    /** @var Reply $reply */
    $reply = factory( Reply::class )->make();

    $this->post( $thread->path() . '/replies', $reply->toArray() );

    $this->get( $thread->path() )->assertSee( $reply->body );
  }
}
