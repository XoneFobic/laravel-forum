<?php declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\User;

/**
 * Class ProfilesController
 *
 * @package App\Http\Controllers
 */
class ProfilesController extends Controller {
  /**
   * Display the specified resource.
   *
   * @param \App\User $user
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show ( User $user ) {
    return view( 'profiles.show', [
      'profileUser' => $user,
      'threads' => $user->threads()->paginate( 30 )
    ] );
  }
}
