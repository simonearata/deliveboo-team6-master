<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Italiano',
                'cover' => 'https://emojigraph.org/media/messenger/spaghetti_1f35d.png',
            ],

            [
                'name' => 'Cinese',
                'cover' => 'https://emojis.wiki/emoji-pics/apple/fortune-cookie-apple.png',
            ],
            [
                'name' => 'Giapponese',
                'cover' => 'https://images.emojiterra.com/google/android-10/512px/1f363.png',
            ],
            [
                'name' => 'Messicano',
                'cover' => 'https://assets.wprock.fr/emoji/joypixels/512/1f32f.png',
            ],
            [
                'name' => 'Indiano',
                'cover' => 'https://assets.wprock.fr/emoji/joypixels/512/1f35b.png',
            ],
            [
                'name' => 'Pesce',
                'cover' => 'https://emojigraph.org/media/apple/tropical-fish_1f420.png',
            ],
            [
                'name' => 'Carne',
                'cover' => 'https://images.emojiterra.com/google/android-oreo/512px/1f969.png',
            ],
            [
                'name' => 'Pizza',
                'cover' => 'https://icon2.cleanpng.com/20180703/ewp/kisspng-chicago-style-pizza-fast-food-cheese-sandwich-clip-pizza-emoji-5b3b08c9b36fe0.293159401530595529735.jpg',
            ],
            [
                'name' => 'Thailandese',
                'cover' => 'https://assets.wprock.fr/emoji/joypixels/512/1f35c.png',
            ],
            [
                'name' => 'Vegetariano',
                'cover' => 'https://emojis.wiki/emoji-pics/apple/green-salad-apple.png',
            ],
            [
                'name' => 'Mediterranea',
                'cover' => 'https://images.emojiterra.com/google/android-pie/512px/1f349.png',
            ],
            [
                'name' => 'Romana',
                'cover' => 'https://images.emojiterra.com/google/android-11/512px/1f373.png',
            ],
        ];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->cover = $category['cover'];
            $new_category->save();
        }
    }
}