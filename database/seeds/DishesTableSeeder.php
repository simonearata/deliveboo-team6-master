<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
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
                'name' => 'Pizza bianca',
                'price' => '8',
                'ingredients' => 'Fior di latte di Agerola',
                'cover' => 'dishesCover/bianca.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 8
            ],
        
            [
                'name' => 'Pizza rossa',
                'price' => '7',
                'ingredients' => 'San Marzano e origano',
                'cover' => 'dishesCover/rossa.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 9
            ],
        
            [
                'name' => 'Pizza Marinara',
                'price' => '7',
                'ingredients' => 'Salsa di pomodoro San Marzano DOP, origano selvatico, aglio rosso, basilico fresco, olio EVO Pregio DOP',
                'cover' => 'dishesCover/marinara.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Pizza Datterino',
                'price' => '9',
                'ingredients' => 'Pomodorini gialli Giagiù del Vesuvio, fior di latte di Agerola, fior di ricotta di Agerola, basilico fresco e olio evo Pregio DOP',
                'cover' => 'dishesCover/datterini.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 9
            ],
        
            [
                'name' => 'Calzone Napoletano',
                'price' => '7',
                'ingredients' => 'Salame crespone BIO, fior di ricotta e provola affumicata di Agerola, pepe nero, basilico fresco',
                'cover' => 'dishesCover/calzone.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 8
            ],
        
            [
                'name' => 'Pizza Diavola',
                'price' => '8',
                'ingredients' => 'Salsa piccante all\'amatriciana, cipolla rossa, pecorino, basilico, olio Pregio, mozzarella di bufala, prosciutto crudo croccante.',
                'cover' => 'dishesCover/diavola.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Pizza Lucana',
                'price' => '8',
                'ingredients' => 'Baccalà mantecato, pomodorini gialli del Vesuvio, fiordilatte d\'Agerola, polvere di olive nere di Caiazzo, chips di peperone dolce Sciuscillone, zest di limone di Sorrento, basilico fresco, olio evo Incluso',
                'cover' => 'dishesCover/lucana.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 6
            ],
        
            [
                'name' => 'Pizza 4 formaggi',
                'price' => '9',
                'ingredients' => 'Gorgonzola di capra Girgentana, mozzarella di bufala Campana DOP, vastedda del Belice DOP, provolone del Monaco DOP, basilico fresco, olio evo Pregio DOP',
                'cover' => 'dishesCover/formaggi.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 5
            ],
        
            [
                'name' => 'Pizza Margherita',
                'price' => '6',
                'ingredients' => 'Salsa di San Marzano DOP, fior di latte di Agerola, basilico fresco e olio evo colline salernitane DOP Pregio',
                'cover' => 'dishesCover/margherita.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Pizza margherita con bufala',
                'price' => '9',
                'ingredients' => 'Salsa di San Marzano DOP, bufala, basilico fresco e olio evo colline salernitane DOP Pregio',
                'cover' => 'dishesCover/bufala.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 3
            ],
        
            [
                'name' => 'Pizza Brontese',
                'price' => '10',
                'ingredients' => 'Fiordilatte di Agerola, pesto di pistacchio di Bronte, parmigiano reggiano, scorza di limone, basilico',
                'cover' => 'dishesCover/brontese.jpg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 2
            ],
        
            [
                'name' => 'Pasta Aglio, olio e peperoncino',
                'price' => '6',
                'ingredients' => 'Aglio, Olio extravergine di oliva, acciughe, prezzemolo, pangrattato e peperoncino',
                'cover' => 'dishesCover/aglio.jpeg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Pasta alla Norma',
                'price' => '7',
                'ingredients' => 'Pomodoro, melanzane, ricotta salata, basilico',
                'cover' => 'dishesCover/norma.jpeg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Tortelli Ricotta e Spinaci',
                'price' => '10',
                'ingredients' => 'Tortelli di parma con ricotta ed erbette mantecati con burro e parmigiano 24 mesi',
                'cover' => 'dishesCover/ricotta.jpeg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Pasta alla genovese',
                'price' => '8',
                'ingredients' => 'pasta con pesto di basilico e aglio',
                'cover' => 'dishesCover/genovese.jpeg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Pasta al ragù di Chianina',
                'price' => '12',
                'ingredients' => 'Ragù di chianina IGP con passata pomodoro',
                'cover' => 'dishesCover/chianina.jpeg',
                'visible' => 1,
                'quantity' => 0,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Tortelli di zucca',
                'price' => '13',
                'ingredients' => 'Tortelli di zucca mantecati con burro nocciola salvia e parmigiano',
                'cover' => 'dishesCover/zucca.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Pasta al pomodoro e basilico',
                'price' => '6',
                'ingredients' => 'Passata di Pomodoro e Basilico',
                'cover' => 'dishesCover/basilico.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Uramaki di tonno',
                'price' => '10',
                'ingredients' => 'Tartare di tonno, sesamo, cipollotto, jalapeño esterni con crunch, tobiko e salsa kimchi',
                'cover' => 'dishesCover/u-tonno.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Sashimi di Salmone',
                'price' => '5',
                'ingredients' => 'salmone',
                'cover' => 'dishesCover/sashimi-s.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Sashimi di Ricciola',
                'price' => '7',
                'ingredients' => 'Ricciola',
                'cover' => 'dishesCover/sashimi-r.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Uramaki Especial',
                'price' => '12',
                'ingredients' => 'Gambero in tempura, sesamo, avocado, carpaccio di avocado esterno, tartare di astice gratinata, maionese, spicy cream e salsa teriyaki',
                'cover' => 'dishesCover/u-special.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Uramaki Pink',
                'price' => '12',
                'ingredients' => 'pasta con pesto di basilico e aglio',
                'cover' => 'dishesCover/u-pink.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 10   
            ],
            [
                'name' => 'Temaki',
                'price' => '8',
                'ingredients' => 'pasta con pesto di basilico e aglio',
                'cover' => 'dishesCover/temaki.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Nigiri Ricciola',
                'price' => '11',
                'ingredients' => 'pasta con pesto di basilico e aglio',
                'cover' => 'dishesCover/nigiri.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Pokè Hawaii',
                'price' => '15',
                'ingredients' => 'Riso bianco, gamberi cotti al vapore, pomodorini, melograno, ananas e edamame',
                'cover' => 'dishesCover/p-hawaii.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Pokè Tuna',
                'price' => '16',
                'ingredients' => 'Riso bianco, dadolata di tonno, cipolla bianca, cetrioli, mandorle, avocado',
                'cover' => 'dishesCover/p-tuna.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Pokè Salmon',
                'price' => '15',
                'ingredients' => 'Riso bianco, dadolata di salmone, avocado, cetrioli, edamame',
                'cover' => 'dishesCover/p-salmon.jpeg',
                'visible' => 0,
                'quantity' => 0,
                'restaurant_id' => 5
            ],
        ];
    
        foreach ($data as $value) {

            $new_dish = new Dish();
            $new_dish->restaurant_id = $value['restaurant_id'];
            $new_dish->name = $value['name'];
            $new_dish->price = $value['price'];
            $new_dish->ingredients = $value['ingredients'];
            $new_dish->cover = $value['cover'];
            $new_dish->quantity = $value['quantity'];
            $new_dish->visible = $value['visible'];
            $new_dish->save();

        }
    }
    
}