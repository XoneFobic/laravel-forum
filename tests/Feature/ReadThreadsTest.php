<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Reply;
use App\Thread;
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
  public function a_user_can_view_all_threads (): void {
    $this->get( '/threads' )->assertSee( $this->thread->title );
  }

  /** @test */
  public function a_user_can_view_a_single_thread (): void {
    $this->get( $this->thread->path() )->assertSee( $this->thread->title );
  }

  /** @test */
  public function a_user_can_read_replies_that_are_associated_with_a_thread (): void {
    /** @var Reply $reply */
    $reply = create( Reply::class, [ 'thread_id' => $this->thread->id ] );

    $this->get( $this->thread->path() )->assertSee( $reply->body );
  }
}
