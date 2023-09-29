<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderStoreRequest;
use App\Http\Resources\OrderCollection;
use App\Models\Customer;
use App\Models\Item;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $customerOrder = CustomerOrder::filter(Request::only('search'))
            ->paginate()
            ->appends(Request::all());

        return Inertia::render('Order/Index', [
            'filters' => Request::all('search', 'trashed'),
            'orders' => new OrderCollection($customerOrder),
        ]);
    }

    public function create()
    {
        return Inertia::render('Order/Create', [
            'customers' => Customer::all(),
            'items' => Item::all(),
        ]);
    }

    public function store(CustomerOrderStoreRequest $request)
    {
        CustomerOrder::create([
            'item_id' => $request->item_id,
            'customer_id' => $request->customer_id,
            'confirm_status' => $request->confirm_status,
            'confirm_price' => $request->confirm_price,
            'org_price' => $request->org_price,
            'remark' => $request->remark,
        ]);
        return Redirect::route('orders')->with('success');
    }

    public function edit(CustomerOrder $customerOrder)
    {
        return Inertia::render("Order/Edit", [
            'customers' => Customer::all(),
            'items' => Item::all(),
            'customerOrder' => $customerOrder
        ]);
    }

    public function update(CustomerOrderStoreRequest $request, CustomerOrder $customerOrder)
    {
        $customerOrder->update([
            'item_id' => $request->item_id,
            'customer_id' => $request->customer_id,
            'confirm_status' => $request->confirm_status,
            'confirm_price' => $request->confirm_price,
            'org_price' => $request->org_price,
            'remark' => $request->remark,
        ]);
        return Redirect::route('orders')->with('success');
    }

    public function destroy(CustomerOrder $customerOrder)
    {
        $customerOrder->delete();
        return Redirect::route('orders')->with('success');
    }
}
