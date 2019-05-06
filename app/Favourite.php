<?php declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Favourite
 *
 * @package App
 */
class Favourite extends Model {
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];
}
