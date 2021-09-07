<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$restaurants = Restaurant::all();
        $restaurants = Restaurant::with('categories')
        /* ->select(
            'restaurants.id',
            'restaurants.restaurant_name',
            'restaurants.p_iva',
            'restaurants.address',
            'restaurants.slug',
            'restaurants.cover',
            'restaurants.type_id',
            'categories.name',
            'categories.id'
        )
        ->join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
        //->join('dishes', 'restaurants.id', '=', 'dishes.restaurant_id')
        ->join('categories', 'category_restaurant.category_id', '=', 'categories.id') */
        ->get();

        $restaurants->each(function($restaurant){
            if($restaurant->cover){
                $restaurant->cover = url('storage/' . $restaurant->cover);
            } else {
                $restaurant->cover = url('img/default-fallback-image.png');
            }
        });
        return response()->json($restaurants);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with(['dishes', 'categories', 'type'])->first();
        /* if($restaurant){
            $data = [
                'success' => true,
                'data' => $restaurant
            ];
            return response()->json($data);
        }
        return response()->json(['success' => false]); */
        if($restaurant){
            if($restaurant->cover){
                $restaurant->cover = url('storage/' . $restaurant->cover);
            } else {
                $restaurant->cover = url('img/default-fallback-image.png');
            }
            return response()->json([
                'success' => true,
                'result'=> $restaurant
            ]);
        }
        return response()->json([
            'success'=> false,
            'error' => 'Nessun post trovato'
        ]);
    }
}
    

