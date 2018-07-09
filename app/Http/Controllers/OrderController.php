<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::completed()->paginate();
        return view('orders.index', compact('orders'));
    }
}
