<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Channel;
use App\Reply;
use App\Thread;
use App\User;
use Tests\DatabaseTestCase;

/**
 * Class ReadThreadsTest
 *
 * @package Tests\Feature
 */
class ReadThreadsTest extends DatabaseTestCase {
  /** @var Thread $thread */
  protected $thread;

  public function setUp (): void {
    parent::setUp();

    $this->thread = create( Thread::class );
  }

  /** @test */
  public function an_user_can_view_all_threads (): void {
    $this->get( '/threads' )->assertSee( $this->thread->title );
  }

  /** @test */
  public function an_user_can_view_a_single_thread (): void {
    $this->get( $this->thread->path() )->assertSee( $this->thread->title );
  }

  /** @test */
  public function an_user_can_read_replies_that_are_associated_with_a_thread (): void {
    /** @var Reply $reply */
    $reply = create( Reply::class, [ 'thread_id' => $this->thread->id ] );

    $this->get( $this->thread->path() )->assertSee( $reply->body );
  }

  /** @test */
  public function an_user_can_filter_threads_according_to_a_channel (): void {
    /** @var Channel $channel */
    $channel = create( Channel::class );

    /** @var Thread $threadInChannel */
    $threadInChannel = create( Thread::class, [ 'channel_id' => $channel->id ] );

    /** @var Thread $threadNotInChannel */
    $threadNotInChannel = create( Thread::class );

    $this->get( "/threads/{$channel->slug}" )
      ->assertSee( $threadInChannel->title )
      ->assertDontSee( $threadNotInChannel->title );
  }

  /** @test */
  public function an_user_can_filter_threads_by_any_username (): void {
    $user = create( User::class, [ 'name' => 'JohnDoe' ] );
    $this->signIn( $user );

    /** @var Thread $threadByJohn */
    $threadByJohn = create( Thread::class, [ 'user_id' => $user->id ] );

    /** @var Thread $threadNotByJohn */
    $threadNotByJohn = create( Thread::class );

    $this->get( '/threads?by=JohnDoe' )
      ->assertSee( $threadByJohn->title )
      ->assertDontSee( $threadNotByJohn->title );
  }
}
