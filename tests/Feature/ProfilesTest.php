<?php declare( strict_types = 1 );

namespace Tests\Feature;

use App\Thread;
use App\User;
use Tests\DatabaseTestCase;

/**
 * Class ProfilesTest
 *
 * @package Tests\Feature
 */
class ProfilesTest extends DatabaseTestCase {

  /** @test */
  public function an_user_has_a_profile () {
    /** @var User $user */
    $user = create( User::class );

    $this->get( '/profiles/' . $user->name )
      ->assertSee( $user->name );
  }

  /** @test */
  public function an_user_profile_displays_all_threads_created_by_the_associated_user () {
    /** @var User $user */
    $user = create( User::class );
    $thread = create( Thread::class, [ 'user_id' => $user->id ] );

    $this->get( '/profiles/' . $user->name )
      ->assertSee( $thread->title )
      ->assertSee( $thread->body );
  }
}

