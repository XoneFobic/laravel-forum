<?php
/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */
declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reply
 *
 * @property int $id
 * @property int $thread_id
 * @property int $user_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favourite[] $favourites
 * @property-read int $favourites_count
 * @property-read \App\User $owner
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereBody( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereThreadId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereUserId( $value )
 * @mixin \Eloquent
 */
class Reply extends Model {
  use Favouritable;
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * The relations to eager load on every query.
   *
   * @var array
   */
  protected $with = [ 'owner', 'favourites' ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function owner () {
    return $this->belongsTo( User::class, 'user_id' );
  }
}
