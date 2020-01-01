<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
    	$users = User::where('isAdmin', 0)->get();
    	return view('admin.users.users' , compact('users'));
    }


    public function show($id){
    	$orders = Order::where('user_id' , $id)->get();
    	
    	return view('admin.users.userDetails' , compact([
    			'orders'
    	]));
    }
}
