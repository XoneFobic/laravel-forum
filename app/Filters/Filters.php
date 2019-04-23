<?php declare( strict_types = 1 );

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;

/**
 * Class Filters
 *
 * @package App\Filters
 */
abstract class Filters {
  protected $filters = [];
  /** @var \Illuminate\Http\Request $request */
  protected $request;
  /** @var QueryBuilder|EloquentBuilder $builder */
  protected $builder;

  /**
   * ThreadsFilter constructor.
   *
   * @param \Illuminate\Http\Request $request
   */
  public function __construct ( Request $request ) {
    $this->request = $request;
  }

  /**
   * @param QueryBuilder|EloquentBuilder $builder
   *
   * @return QueryBuilder|EloquentBuilder
   */
  public function apply ( $builder ) {
    $this->builder = $builder;

    foreach ($this->getFilters() as $filter => $value) {
      if (method_exists( $this, $filter )) {
        $this->$filter( $value );
      }
    }

    return $this->builder;
  }

  /**
   * @return array
   */
  protected function getFilters (): array {
    return $this->request->only( $this->filters );
  }
}
