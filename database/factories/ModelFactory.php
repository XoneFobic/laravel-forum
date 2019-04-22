<?php declare( strict_types = 1 );

use App\Channel;
use App\Reply;
use App\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define( User::class, function ( Faker $faker ) {
  static $password;

  return [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'email_verified_at' => now(),
    'password' => $password ?: ( $password = bcrypt( 'secret' ) ),
    'remember_token' => Str::random( 10 )
  ];
} );

$factory->define( Thread::class, function ( Faker $faker ) {
  return [
    'user_id' => function () {
      return factory( User::class )->create()->id;
    },
    'channel_id' => function () {
      return factory( Channel::class )->create()->id;
    },
    'title' => $faker->sentence,
    'body' => $faker->paragraph
  ];
} );

$factory->define( Reply::class, function ( Faker $faker ) {
  return [
    'thread_id' => function () {
      return factory( Thread::class )->create()->id;
    },
    'user_id' => function () {
      return factory( User::class )->create()->id;
    },
    'body' => $faker->paragraph
  ];
} );

$factory->define( Channel::class, function ( Faker $faker ) {
  $name = $faker->unique()->word;

  return [
    'name' => $name,
    'slug' => Str::slug( $name )
  ];
} );
