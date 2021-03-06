<?php
/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */
declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Channel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Thread[] $threads
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel whereSlug( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Channel whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Channel extends Model {
  /**
   * Get the route key for the model.
   *
   * @return string
   */
  public function getRouteKeyName () {
    return 'slug';
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function threads () {
    return $this->hasMany( Thread::class );
  }
}
