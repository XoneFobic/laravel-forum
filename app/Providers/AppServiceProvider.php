<?php declare( strict_types = 1 );

namespace App\Providers;

use App\Channel;
use Cache;
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
      $channels = Cache::remember( 'channels', 3600, function () {
        return Channel::all();
      } );

      /** @var \Illuminate\View\View $view */
      $view->with( 'channels', $channels );
    } );
  }
}
