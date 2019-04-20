<?php declare( strict_types = 1 );

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class DatabaseTestCase
 *
 * @package Tests
 */
abstract class DatabaseTestCase extends TestCase {
  use DatabaseMigrations;
}
