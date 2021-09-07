<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $new_user = new User();
            $new_user->name = $faker->name();
            $new_user->email =  $faker->email();
            $new_user->password = $faker->password();
            $new_user->save();
        }
    }
}