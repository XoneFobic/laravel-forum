<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class CreateThreadsTest
 *
 * @package Tests\Feature
 */
class CreateThreadsTest extends TestCase {
  use DatabaseMigrations;

  /** @test */
  function a_guest_may_not_create_threads () {
    $this->expectException( 'Illuminate\Auth\AuthenticationException' );
    $this->post( '/threads', factory( Thread::class )->raw() );
  }

  /** @test */
  function an_authenticated_user_can_create_new_forum_threads () {
    $this->signIn( factory( User::class )->create() );

    /** @var Thread $thread */
    $thread = factory( Thread::class )->make();

    $this->post( '/threads', $thread->toArray() );

    $this->get( $thread->path() )
      ->assertSee( $thread->title )
      ->assertSee( $thread->body );
  }
}
