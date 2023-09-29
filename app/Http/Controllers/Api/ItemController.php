<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\ItemCollection;
use App\Models\Item;
use Illuminate\Support\Facades\Request;

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
        return new ItemCollection($item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        return response()->json([
            'message' => 'Item Added'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return response()->json([
            'message' => 'Item Detail',
            "data" => $item
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
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
        dd($item);
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

        return response()->json([
            'message' => 'Item Updated'
        ], 201);
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
        return response()->json([
            "success" => true,
            "message" => "Item deleted successfully.",
        ]);
    }
}
