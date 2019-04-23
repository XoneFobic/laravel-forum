<?php declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\ThreadsFilter;
use App\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ThreadController
 *
 * @package App\Http\Controllers
 */
class ThreadsController extends Controller {
  public function __construct () {
    $this->middleware( 'auth' )->except( [ 'index', 'show' ] );
  }

  /**
   * Display a listing of the resource.
   *
   * @param \App\Channel $channel
   *
   * @param \App\Filters\ThreadsFilter $filters
   *
   * @return \Illuminate\View\View
   */
  public function index ( Channel $channel, ThreadsFilter $filters ): View {
    /** @var Thread $threads */
    $threads = $channel->exists ? $channel->threads()->latest() : Thread::latest();
    $threads = $threads->filter( $filters )->get();

    return view( 'threads.index', compact( 'threads' ) );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create () {
    return view( 'threads.create' );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store (): RedirectResponse {
    $this->validate( request(), [
      'title' => [ 'required' ],
      'body' => [ 'required' ],
      'channel_id' => [ 'required', 'exists:channels,id' ]
    ] );

    $thread = Thread::create( [
      'user_id' => auth()->id(),
      'channel_id' => request( 'channel_id' ),
      'title' => request( 'title' ),
      'body' => request( 'body' )
    ] );

    return redirect( $thread->path() );
  }

  /**
   * Display the specified resource.
   *
   * @param $channelId
   * @param \App\Thread $thread
   *
   * @return \Illuminate\View\View
   */
  public function show ( $channelId, Thread $thread ): View {
    return view( 'threads.show', compact( 'thread' ) );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Thread $thread
   *
   * @return \Illuminate\Http\Response
   */
  public function edit ( Thread $thread ) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \App\Thread $thread
   *
   * @return \Illuminate\Http\Response
   */
  public function update ( Thread $thread ) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Thread $thread
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy ( Thread $thread ) {
    //
  }
}
