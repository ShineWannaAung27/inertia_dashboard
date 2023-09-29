<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use Illuminate\Support\Facades\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::filter(Request::only('search'))
            ->paginate()
            ->appends(Request::all());
        return new CustomerCollection($customer);



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
    public function store(CustomerStoreRequest $request)
    {
        Customer::create([
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
            'message'=>'Item Added'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'message'=>'Item Detail',
            "data" => $customer
        ],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerStoreRequest $request, Customer $customer)
    {
        dd($customer);
        $customer->update([
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
            'message'=>'Item Updated'
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            "success" => true,
            "message" => "Item deleted successfully.",
        ]);

    }
}
