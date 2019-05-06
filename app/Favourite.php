<?php declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Favourite
 *
 * @property int $id
 * @property int $user_id
 * @property int $favourited_id
 * @property string $favourited_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereFavouritedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereFavouritedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favourite whereUserId($value)
 * @mixin \Eloquent
 */
class Favourite extends Model {
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];
}
