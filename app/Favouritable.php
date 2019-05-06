<?php declare( strict_types = 1 );

namespace App;

/**
 * Trait Favouritable
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favourite[] $favourites
 */
trait Favouritable {
  /**
   * @return int
   */
  public function getFavouritesCountAttribute () {
    return $this->favourites->count();
  }

  /**
   * @return bool
   */
  public function isFavourited (): bool {
    return !!$this->favourites->where( 'user_id', auth()->id() )->count();
  }

  /**
   * Favourite a reply
   *
   * @param int $userId
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function favourite ( int $userId ) {
    $attributes = [ 'user_id' => $userId ];
    if (
    !$this->favourites()
      ->where( $attributes )
      ->exists()
    ) {
      return $this->favourites()->create( $attributes );
    }

    return null;
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\MorphMany
   */
  public function favourites () {
    return $this->morphMany( Favourite::class, 'favourited' );
  }
}
