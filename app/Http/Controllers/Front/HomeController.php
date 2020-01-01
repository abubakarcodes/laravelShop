<?php

namespace App\Http\Controllers\Front;
use App\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index(){

   		$products = product::paginate(4);
   		return view('front.home')->with('products' , $products);
   }
}
