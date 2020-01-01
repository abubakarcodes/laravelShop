<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function index(){
    	$orders = Order::all();
    	
    	return view('admin.orders.order', compact('orders'));

    }

    public function show($id){
    	$order = Order::find($id);
    	return view('admin.orders.orderDetails' , compact('order'));

    }

    public function pending($id){
    	//find order
    	$order = Order::find($id);
    	//update to confirm
    	$order->status = 0;
    	$order->save();
    	//redirect back and show message
    	return redirect()->Route('admin.orders')->with('success' , 'Your order has been added to pending');
    }
    public function confirm($id){
    	//find order
    	$order = Order::find($id);
    	//update to confirm
    	$order->status = 1;
    	$order->save();
    	//redirect back and show message
    	return redirect()->Route('admin.orders')->with('success' , 'Your order has been confirmed');
    }
}
