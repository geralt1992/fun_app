<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\content;
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
        
    ];
});

$factory->define(content::class, function (Faker $faker){

    return [
        'user' => $faker->name,
        'nabijem_zbog' => $faker->randomElement(
            ['At nam minus voluptatem itaque voluptate modi voluptatum numquam officia sequi maxime!', 
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sint quaerat dolore veniam, cum asperiores.', 
            'Obcaecati ut, magni ipsum commodi veniam officia delectus consequuntur voluptate quaerat cumque doloribus deserunt 
            iste quibusdam labore sequi aut sit officiis nisi eaque possimus vel est. Dolorum doloribus eligendi ipsum suscipit quis.',
            ]),
        'nabijem_koga' => $faker->randomElement(['dario', 'matej', 'nina', 'čokolina']),
        'created_at' => $faker->date,





    ];

});
