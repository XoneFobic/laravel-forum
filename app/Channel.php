<?php declare( strict_types = 1 );

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Channel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Channel newModelQuery()
 * @method static Builder|Channel newQuery()
 * @method static Builder|Channel query()
 * @method static Builder|Channel whereCreatedAt( $value )
 * @method static Builder|Channel whereId( $value )
 * @method static Builder|Channel whereName( $value )
 * @method static Builder|Channel whereSlug( $value )
 * @method static Builder|Channel whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Channel extends Model {

}
