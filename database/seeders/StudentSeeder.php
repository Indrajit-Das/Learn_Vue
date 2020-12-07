<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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
        foreach(range(1,2000) as $index){
            DB::table('students')->insert([
                'name'=>$faker->name,
                'school'=>$faker->name,
                'in_class'=>$faker->numberBetween(6,20),
                'roll'=>$faker->numberBetween(1,200),
                'position'=>$faker->name,
                'age'=>$faker->numberBetween(10,30),
                'religion'=>$faker->name,
                //'created_at'=>Carbon::instance($faker->dateTimeThisMonth())->toDateTimeString(),
            ]);
        }
    }
}
