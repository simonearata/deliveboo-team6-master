<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        //$dishes = Dish::where('restaurant_id', Auth::id())->get();
        return view('admin.dishes.index', compact('dishes', 'restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        /* $restaurants=Restaurant::all();
        return view('admin.dishes.create', compact('restaurants')); */
        //$restaurants = Restaurant::all();
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        if(!$restaurants){
            abort(404);
        }

        return view('admin.dishes.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        $data = $request->all();
        //dd($data);
        //$data["restaurant_id"]= Auth::id();

        if(array_key_exists('cover',$data)){
            $data['cover_name'] = $request->file('cover')->getClientOriginalName();
            $img_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $img_path;
        }

        $new_dish = new Dish();
        $new_dish->fill($data);
        $new_dish->save();

        return redirect()->route('admin.restaurants.index', $new_dish);
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
        $dishes = Dish::all();
        if(!$dishes){
            abort(404);
        }

        return view('admin.dishes.show', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);

        if (!$dish) {
            abort(404);
        }
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

        $data = $request->all();

        if(array_key_exists('cover',$data)){
            if($dish->cover){
                //se si sostituisce l'immagine, elimina quella vecchia
                Storage::delete($dish->cover);
            }
            $data['cover_name'] = $request->file('cover')->getClientOriginalName();
            $img_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $img_path;
        }

        $dish->update($data);

        return redirect()->route('admin.restaurants.show',$dish->restaurant_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $restaurant = Restaurant::find($dish->restaurant_id);
        if($dish->cover){
            Storage::delete($dish->cover);
        }
        $dish->delete();
        return redirect()->route('admin.dishes.show', $restaurant)->with('deleted', $dish->name);
    }
}