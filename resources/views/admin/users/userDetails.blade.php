@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">{{$orders[0]->user->name}} Order Details</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.users') }}" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
@include('admin.layouts.inc.messages')
  <div class="content table-responsive table-full-width">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Order Address</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
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
                                        {{$order->address}}
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
                                       <table class="table table-primary">
                                  @foreach($order->orderItems as $item)

                                  <tr>
                                      <td> {{$item->price}}</td>
                                      
                                  </tr>
                                 
                                  @endforeach
                                  
                              </table> 
                                    </td>
                                    <td>
                                        {{$order->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        @if($order->status)
                                       <span class="badge badge-success">Confirmed</span>
                                       @else
                                       <span class="badge badge-warning">Pending</span>
                                       @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
@endsection
