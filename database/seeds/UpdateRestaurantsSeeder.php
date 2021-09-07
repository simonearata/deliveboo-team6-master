<?php

use App\Restaurant;
use App\Type;
use Illuminate\Database\Seeder;

class UpdateRestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $data = [
                'type_id' => Type::inRandomOrder()->first()->id
            ];
            $restaurant->update($data);
        }
    }
}

