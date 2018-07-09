<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::completed()->paginate();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = str_slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $order = Order::create($data);
        return redirect()->route('edit_order', ['id' => $order->id]);
    }
}
