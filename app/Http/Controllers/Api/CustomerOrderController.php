<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerOrderStoreRequest;
use App\Http\Resources\OrderCollection;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Request;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerOrder = CustomerOrder::filter(Request::only('search'))
            ->paginate()
            ->appends(Request::all());
        return new OrderCollection($customerOrder);

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
    public function store(CustomerOrderStoreRequest $request)
    {
        CustomerOrder::create([
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
            'message'=>'Customer Order Added'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOrder $customerOrder)
    {
        return response()->json([
            'message'=>'Customer Order Detail',
            "data" => $customerOrder
        ],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOrder $customerOrder)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerOrderStoreRequest $request, CustomerOrder $customerOrder)
    {
        $customerOrder->update([
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
            'message'=>'Customer Order Updated'
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOrder $customerOrder)
    {
        $customerOrder->delete();
        return response()->json([
            "success" => true,
            "message" => "Item Order deleted successfully.",
        ]);

    }
}
