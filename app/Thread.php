<?php
/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */
declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Thread
 *
 * @property int $id
 * @property int $user_id
 * @property int $channel_id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Channel $channel
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reply[] $replies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread filter( $filters )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereBody( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereChannelId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereTitle( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Thread whereUserId( $value )
 * @mixin \Eloquent
 */
class Thread extends Model {
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Return URL string for a specific thread.
   *
   * @return string
   */
  public function path () {
    return "/threads/{$this->channel->slug}/{$this->id}";
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function creator () {
    return $this->belongsTo( User::class, 'user_id' );
  }

  /**
   * @param array $reply
   */
  public function addReply ( array $reply ) {
    $this->replies()->create( $reply );
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function replies () {
    return $this->hasMany( Reply::class );
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function channel () {
    return $this->belongsTo( Channel::class );
  }

  /**
   * @param $query
   * @param \App\Filters\ThreadsFilter $filters
   *
   * @return mixed
   */
  public function scopeFilter ( $query, $filters ) {
    return $filters->apply( $query );
  }
}
