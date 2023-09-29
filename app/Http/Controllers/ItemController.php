<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemCollection;
use App\Http\Requests\ItemStoreRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Item;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::filter(Request::only('search'))
            ->paginate()
            ->appends(Request::all());

        return Inertia::render('Item/Index', [
            'filters' => Request::all('search', 'trashed'),
            'items' => new ItemCollection($item),
        ]);

        // return new ItemCollection($item);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Item/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'itemcode' => $request->itemcode,
            'description' => $request->description,
            'price' => $request->price,
            'kyat' => $request->kyat,
            'pae' => $request->pae,
            'yway' => $request->yway,
            'image' => $request->image,
        ]);

        // $response = Http::put('http://127.0.0.1:8000/api/items', [
        //     'name' => $request->name,
        //     'itemcode' => $request->itemcode,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'kyat' => $request->kyat,
        //     'pae' => $request->pae,
        //     'yway' => $request->yway,
        //     'image' => $request->image,

        // ]);
        return Redirect::route('items')->with('success');

        // return response()->json([
        //     'message'=>'Item Added'
        // ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return Inertia::render('Item/Edit', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return Inertia::render('Item/Edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemStoreRequest $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'itemcode' => $request->itemcode,
            'description' => $request->description,
            'price' => $request->price,
            'kyat' => $request->kyat,
            'pae' => $request->pae,
            'yway' => $request->yway,
            'image' => $request->image
        ]);


        return Redirect::route('items')->with('success');

        // return response()->json([
        //     'message'=>'Item Updated'
        // ],201);
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
        return Redirect::route('items')->with('success');

    }
}
