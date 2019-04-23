<?php declare( strict_types = 1 );

namespace Tests\Unit;

use App\Channel;
use App\Thread;
use Tests\DatabaseTestCase;

class ChannelTest extends DatabaseTestCase {
  /** @test */
  public function a_channel_consists_of_threads (): void {
    /** @var Channel $channel */
    $channel = create( Channel::class );

    /** @var Thread $thread */
    $thread = create( Thread::class, [ 'channel_id' => $channel->id ] );

    $this->assertTrue( $channel->threads->contains( $thread ) );
  }
}
