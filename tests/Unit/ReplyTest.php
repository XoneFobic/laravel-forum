<?php declare( strict_types = 1 );

namespace Tests\Unit;

use App\Reply;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ReplyTest
 *
 * @package Tests\Unit
 */
class ReplyTest extends TestCase {
  use DatabaseMigrations;

  /** @test */
  public function a_reply_has_an_owner () {
    /** @var Reply $reply */
    $reply = factory( Reply::class )->create();

    $this->assertInstanceOf( User::class, $reply->owner );
  }
}
