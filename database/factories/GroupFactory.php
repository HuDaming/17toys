<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Group::class, function (Faker $faker) {
    $now = Carbon::now()->toDateTimeString();

    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});