<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BarangModel;
use Faker\Generator as Faker;

$factory->define(BarangModel::class, function (Faker $faker) {
    return
    [
        'nama_bar' => $faker->colorName,
        'jumlah_bar' => $faker->numberBetween($min = 1, $max = 90)
    ];
});
