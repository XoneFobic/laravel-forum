<?php declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\RedirectResponse;

/**
 * Class RepliesController
 *
 * @package App\Http\Controllers
 */
class RepliesController extends Controller {
  public function __construct () {
    $this->middleware( 'auth' );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param $channelId
   * @param \App\Thread $thread
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store ($channelId, Thread $thread ): RedirectResponse {
    $thread->addReply( [
      'body' => request( 'body' ),
      'user_id' => auth()->id()
    ] );

    return back();
  }
}
