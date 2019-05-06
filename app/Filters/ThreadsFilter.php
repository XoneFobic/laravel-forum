<?php declare( strict_types = 1 );

namespace App\Filters;

use App\User;

/**
 * Class ThreadsFilter
 *
 * @package App\Filters
 */
class ThreadsFilter extends Filters {
  protected $filters = [ 'by', 'popular' ];

  /**
   * Filter the query by given username
   *
   * @param string $username
   *
   * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
   */
  protected function by ( $username ) {
    /** @var User $user */
    $user = User::where( 'name', $username )->firstOrFail();

    return $this->builder->where( 'user_id', $user->id );
  }

  /**
   * Sort the query by popularity
   *
   * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
   */
  protected function popular () {
    $this->builder->getQuery()->orders = [];

    return $this->builder->orderBy( 'replies_count', 'desc' );
  }
}
