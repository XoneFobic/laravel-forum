<?php declare( strict_types = 1 );

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package Tests
 */
abstract class TestCase extends BaseTestCase {
  use CreatesApplication;

  /**
   * @param \App\User $user
   *
   * @return \Tests\TestCase
   */
  protected function signIn ( $user = null ) {
    $user = $user ?: create( User::class );

    $this->actingAs( $user );

    return $this;
  }
}
