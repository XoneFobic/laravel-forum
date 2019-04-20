<?php declare( strict_types = 1 );

namespace App\Http\Middleware;

use Closure;

/**
 * Class RedirectIfAuthenticated
 *
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated {
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @param string|null $guard
   *
   * @return mixed
   */
  public function handle ( $request, Closure $next, $guard = null ) {
    $authenticated = auth()
      ->guard( $guard )
      ->check();

    if ($authenticated) {
      return redirect( '/home' );
    }

    return $next( $request );
  }
}
