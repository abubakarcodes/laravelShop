<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
class ClientController extends Controller
{
       public function show($id){
       		$user = User::where('id' , $id)->first();
       		$order = Order::where('user_id' , $id)->get();
       		return view('front.profile.clientDetails' , compact('user' , 'order'));
       }
}
