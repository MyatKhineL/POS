<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('item.index',compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->user_id = Auth::id();
        $item->price = $request->price;

        if($request->file('photo')){
            $image_name = uniqid().'.'.$request->file('photo')->extension();
            $request->file('photo')->storeAs("public/photo",$image_name);
        }
        $item->photo = $image_name;
        $item->save();
        return redirect()->route('item.index')->with('create','Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('item.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->price = $request->price;
        if($request->hasFile('photo')){

            //delete old cover
            Storage::delete("public/photo/".$item->photo);

            //upload new cover
            $newName = "item_".uniqid().".".$request->file("photo")->extension();
            $request->file("photo")->storeAs("public/photo",$newName);

            // save to table
            $item->photo = $newName;



        }

        $item->update();
        return redirect()->route('item.index')->with('create','Created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('create','Created');

    }
}
