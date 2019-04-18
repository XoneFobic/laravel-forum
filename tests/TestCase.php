<?php declare( strict_types = 1 );

namespace Tests;

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
   */
  public function signIn ( $user ) {
    $this->be( $user );
  }
}
