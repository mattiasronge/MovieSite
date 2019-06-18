<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Actor;
use App\Agent;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Actor::class, 100)->create();
        //make 40 numbers of seed content using fake.
        factory(App\Agent::class, 40)->create();

        factory(App\Movie::class, 30)->create()->each(function($a) {
            $slumptal = mt_rand(1, 20);
            $a->actors()->attach(App\Actor::all()->random($slumptal));
            $a->agents()->attach(App\Agent::all()->random($slumptal));
        });


        //factory(Movie::class, 10)->create();
        //factory(Actor::class, 20)->create();
    }
}
