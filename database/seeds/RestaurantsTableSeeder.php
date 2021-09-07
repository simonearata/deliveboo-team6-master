<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'restaurant_name' => 'Trattoria del Voltone',
                'p_iva' => '01234567899',
                'address' => 'Via Sforza Caolzio, 159, Castell\'Arquato',
                'cover' =>'uploads/voltone11.jpg'
            ],
            [
              'user_id' => '2',
              'restaurant_name' => 'La Locanda del Verro',
              'p_iva' => '03634997899',
              'address' => 'Via Salvo D\'Acquisto, 11, Torino',
              'cover' =>'uploads/locanda-del-verro.jpg'
            ],
            [
              'user_id' => '3',
              'restaurant_name' => 'Le Millesfoglie',
              'p_iva' => '14584997899',
              'address' => 'Parco delle Vittorie, 6, Roma',
              'cover' =>'uploads/millesfoglie.jpg'
            ],
            [
              'user_id' => '4',
              'restaurant_name' => 'Trattoria via Ferrari',
              'p_iva' => '14580007899',
              'address' => 'Via Piero Ferrari, 21, Modena',
              'cover' =>'uploads/via-ferrari.jpg'
            ],
            [
              'user_id' => '5',
              'restaurant_name' => 'Cencio La parolaccia ',
              'p_iva' => '14584934587',
              'address' => 'Vicolo del Cinque, 3, Roma',
              'cover' =>'uploads/cencio-la-parolaccia.jpg'
            ],
            [
              'user_id' => '6',
              'restaurant_name' => 'Ostaria da Nando',
              'p_iva' => '16589934587',
              'address' => 'Via Sant\'Anselmo, 9, Aosta',
              'cover' =>'uploads/da-nando.jpg'
            ],
            [
              'user_id' => '7',
              'restaurant_name' => 'La Fortezza',
              'p_iva' => '16512345587',
              'address' => 'Via del Recinto, 1/3, Castiglione della Pescaia',
              'cover' =>'uploads/la-fortezza.jpg'
            ],
            [
              'user_id' => '8',
              'restaurant_name' => 'Jubin Due',
              'p_iva' => '19875641257',
              'address' => 'Via Padova, 7, Milano',
              'cover' =>'uploads/cinese.jpg'
            ],
            [
              'user_id' => '9',
              'restaurant_name' => 'Vivarelli',
              'p_iva' => '11234412577',
              'address' => 'Via Superchi, 7, Genova',
              'cover' =>'uploads/vivarelli.jpg'
            ],
            [
              'user_id' => '10',
              'restaurant_name' => 'Roma Antica',
              'p_iva' => '19875000257',
              'address' => 'Via Buonarroti, 5, Roma',
              'cover' =>'uploads/roma-antica.jpg'
            ],
        ];

        foreach ($data as $value) {

            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $value['user_id'];
            $new_restaurant->restaurant_name = $value['restaurant_name'];
            $new_restaurant->slug = Str::slug($value['restaurant_name'],'-');
            $new_restaurant->p_iva = $value['p_iva'];
            $new_restaurant->address = $value['address'];
            $new_restaurant->cover = $value['cover'];
            $new_restaurant->save();

        }
    }
}