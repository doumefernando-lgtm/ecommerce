<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order) {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order) {
        $order->update(['status'=>$request->status]);
        return back();
    }
}

