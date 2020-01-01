@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Orders</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.dashboard')}}" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
@include('admin.layouts.inc.messages')
<div class="table-responsive">

 <table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
         <td>{{$order->id}}</td>

         <td>{{$order->user->name}}</td>
         <td>
            <table class="table table-primary">
                 @foreach($order->product as $product)
              <tr>
                   
                <td>  {{$product->product_name}} </td>
            
              </tr>
               @endforeach
            </table>
           
         </td>
         <td>
            <table class="table table-primary">
          @foreach($order->orderItems as $item)

          <tr>
              <td> {{$item->quantity}}</td>
          </tr>
         
          @endforeach
      </table>
      </td>
      <td> 
       @if($order->status)
       <span class="badge badge-success">Confirmed</span>
       @else
       <span class="badge badge-warning">Pending</span>
       @endif
   </td>
   <td>
    @if($order->status)
      {{link_to_route('admin.order.pending' , 'Pending' , $order->id, ['class' => 'btn btn-warning btn-sm'])}}
      @else
       {{link_to_route('admin.order.confirm' , 'Confirm' , $order->id, ['class' => 'btn btn-success btn-sm'])}}
       @endif

       {{link_to_route('admin.order.details' , 'Details' , $order->id, ['class' => 'btn btn-primary btn-sm'])}}
   </td>
</tr>
@endforeach
</tbody>
</table>

</div>

@endsection
