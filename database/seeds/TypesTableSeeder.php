<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Ristorante',
            'Pizzeria',
            'Osteria',
            'Trattoria',
            'Fast Food',
            'Paninoteca',
            'Vineria',
            'Self Service',
            'Tavola Calda'
        ];

        foreach ($types as $type) {
            
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->save();

        }
    }
}
