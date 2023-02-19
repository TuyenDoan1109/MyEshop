<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'avatar' => 'tuyen_avatar.jpg',
        'phone' => $faker->numerify('##########'),   // 10 numbers
        'email_verified_at' => now(),
        'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
        'remember_token' => Str::random(10),

        'created_at' => now(),
        'updated_at' => now()
    ];
});
