<?php declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Reply;

/**
 * Class FavouritesController
 *
 * @package App\Http\Controllers
 */
class FavouritesController extends Controller {
  public function __construct () {
    $this->middleware( 'auth' );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \App\Reply $reply
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function store ( Reply $reply ) {
    return $reply->favourite( auth()->id() );
  }
}
