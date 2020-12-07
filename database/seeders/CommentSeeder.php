<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker =Faker::create();
        foreach(range(1,4000) as $index){
            DB::table('comments')->insert([
                'name'=>$faker->name,
                'country'=>$faker->name,
                'salary'=>$faker->numberBetween(5000,200000),
                'comments'=>$faker->name,
                //'created_at'=>Carbon::instance($faker->dateTimeThisMonth())->toDateTimeString(),
            ]);
        }
    }
}
