<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Models\CustomerOrder;
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
}
