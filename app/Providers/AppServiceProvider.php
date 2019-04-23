<?php declare( strict_types = 1 );

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;
use View;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register () {
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot () {
    View::composer( '*', function ( $view ) {
      $view->with( 'channels', Channel::all() );
    } );
  }
}
