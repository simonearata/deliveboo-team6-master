<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dish = Dish::all();
        $restaurants = Restaurant::all();
        $restaurants = Restaurant::where('user_id', Auth::id())->get();

        return view('admin.restaurants.index', compact('restaurants', 'dish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admin.restaurants.create', compact('types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $data = $request->all();
        //dd($data);
        $data["user_id"]= Auth::id();

        $data['slug'] = Str::slug($data['restaurant_name'], '-');
        $slug_exsist=Restaurant::where('slug',$data['slug'])->first();
        $counter = 0;
        while($slug_exsist){
            $restaurant_name=$data['restaurant_name'] . "-" . $counter;
            $data['slug']=Str::slug($restaurant_name,'-');
            $slug_exsist=Restaurant::where('slug',$data['slug'])->first();
            $counter++;
        }

        if(array_key_exists('cover',$data)){
            $data['cover_name'] = $request->file('cover')->getClientOriginalName();
            $img_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $img_path;
        }

        $new_restaurant = new Restaurant();
        $new_restaurant->fill($data);
        $new_restaurant->save();
        
      
        if(array_key_exists('categories',$data)){
            
            $new_restaurant->categories()->attach($data['categories']);
        }

        return redirect()->route('admin.restaurants.show', $new_restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        if(!$restaurant){
            abort(404);
        }

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $categories = Category::all();
        $types = Type::all();
        if (!$restaurant) {
            abort(404);
        }
        return view('admin.restaurants.edit', compact('restaurant', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->all();

        if($restaurant->restaurant_name !== $restaurant['restaurant_name']){
            $data['slug'] = $restaurant->restaurant_name;
        }else{
            $data['slug']=Str::slug($data['restaurant_name'],'-');
            $slug_exsist=Restaurant::where('slug',$data['slug'])->first();
            $counter = 0;
            while($slug_exsist){
                $name=$data['restaurant_name'] . "-" . $counter;
                $data['slug']=Str::slug($name,'-');
                $slug_exsist=Restaurant::where('slug',$data['slug'])->first();
                $counter++;
            }
        }

        if(array_key_exists('cover',$data)){
            if($restaurant->cover){
                //se si sostituisce l'immagine, elimina quella vecchia
                Storage::delete($restaurant->cover);
            }
            $data['cover_name'] = $request->file('cover')->getClientOriginalName();
            $img_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $img_path;
        }

        $restaurant->update($data);
        if(array_key_exists('types',$data)){
            $restaurant->type()->sync($data['types']);
        }
        return redirect()->route('admin.restaurants.show',$restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->cover){
            Storage::delete($restaurant->cover);
        }
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index')->with('deleted', $restaurant->restaurant_name);
    }
}
