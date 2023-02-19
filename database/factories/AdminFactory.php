<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify('##########'),   // 10 numbers
        'address' => $faker->address,
        'email_verified_at' => now(),
        'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
        'remember_token' => Str::random(10),

        'created_at' => now(),
        'updated_at' => now()
    ];
});
