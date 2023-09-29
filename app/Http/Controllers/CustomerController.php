<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use Inertia\Inertia;
use App\Models\Customer;
use App\Http\Resources\ItemCollection;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\CustomerCollection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Customer::filter(Request::only('search'))
            ->paginate()
            ->appends(Request::all());

        return Inertia::render('Customer/Index', [
            'filters' => Request::all('search', 'trashed'),
            'customers' => new CustomerCollection($item),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Customer/Create');
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
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        return Redirect::route('customers')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return Inertia::render("Customer/Edit", [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerStoreRequest $request, Customer $customer)
    {
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        return Redirect::route('customers')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::route('customers')->with('success');
    }
}
