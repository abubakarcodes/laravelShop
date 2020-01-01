<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function user(){
   		return $this->belongsTo(User::class);

   }

   public function orderItems(){
   	return $this->hasMany(OrderItems::class);

   }

   public function product(){
   	 return $this->belongsToMany(product::class , 'order_items');
   }
}
