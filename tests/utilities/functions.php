<?php declare( strict_types = 1 );

/**
 * @param $class
 * @param array $attributes
 * @param int|null $times
 *
 * @return mixed
 */
function create ( $class, $attributes = [], $times = null ) {
  return factory( $class, $times )->create( $attributes );
}

/**
 * @param $class
 * @param array $attributes
 * @param int|null $times
 *
 * @return mixed
 */
function make ( $class, $attributes = [], $times = null ) {
  return factory( $class, $times )->make( $attributes );
}

/**
 * @param $class
 * @param array $attributes
 * @param int|null $times
 *
 * @return mixed
 */
function raw ( $class, $attributes = [], $times = null ) {
  return factory( $class, $times )->raw( $attributes );
}
