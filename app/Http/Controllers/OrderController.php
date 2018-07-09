<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

use Auth;
use Gate;

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

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Order $order, UpdateOrderRequest $request)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = str_slug($data['title']);
        $order->fill($data)->save();
        return back();
    }

    public function complete(Order $order)
    {
        $order->completed = true;
        $order->save();
        return back();
    }

    public function show($id)
    {
        $order = Order::completed()->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function pending()
    {
        $ordersQuery = Order::uncompleted();
        if(Gate::denies('see-all-orders')) {
            $ordersQuery = $ordersQuery->where('user_id', Auth::user()->id);
        }
        $orders = $ordersQuery->paginate();
        return view('orders.pending', compact('orders'));
    }
}
